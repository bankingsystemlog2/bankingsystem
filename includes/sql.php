<?php
  require_once('includes/load.php');

/*--------------------------------------------------------------*/
/* Function for find all database table rows by table name
/*--------------------------------------------------------------*/
function find_all($table) {
   global $db;
   if(tableExists($table))
   {
     return find_by_sql("SELECT * FROM ".$db->escape($table));
   }
}
/*--------------------------------------------------------------*/
/* Function for Perform queries
/*--------------------------------------------------------------*/
function find_by_sql($sql)
{
  global $db;
  $result = $db->query($sql);
  $result_set = $db->while_loop($result);
 return $result_set;
}
/*--------------------------------------------------------------*/
/*  Function for Find data from table by id
/*--------------------------------------------------------------*/
function find_by_id($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE id='{$db->escape($id)}' LIMIT 1");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
}
/*--------------------------------------------------------------*/
/* Function for Delete data from table by id
/*--------------------------------------------------------------*/
function delete_by_id($table,$id)
{
  global $db;
  if(tableExists($table))
   {
    $sql = "DELETE FROM ".$db->escape($table);
    $sql .= " WHERE id=". $db->escape($id);
    $sql .= " LIMIT 1";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
   }
}
/*--------------------------------------------------------------*/
/* Function for Count id  By table name
/*--------------------------------------------------------------*/

function count_by_id($table){
  global $db;
  if(tableExists($table))
  {
    $sql    = "SELECT COUNT(id) AS total FROM ".$db->escape($table);
    $result = $db->query($sql);
     return($db->fetch_assoc($result));
  }
}
/*--------------------------------------------------------------*/
/* Determine if database table exists
/*--------------------------------------------------------------*/
function tableExists($table){
  global $db;
  $table_exit = $db->query('SHOW TABLES FROM '.DB_NAME.' LIKE "'.$db->escape($table).'"');
      if($table_exit) {
        if($db->num_rows($table_exit) > 0)
              return true;
         else
              return false;
      }
  }
 /*--------------------------------------------------------------*/
 /* Login with the data provided in $_POST,
 /* coming from the login form.
/*--------------------------------------------------------------*/
  function authenticate($username='', $password='') {
    global $db;
    $username = $db->escape($username);
    $password = $db->escape($password);
    $sql  = sprintf("SELECT id,username,password,user_level FROM users WHERE username ='%s' LIMIT 1", $username);
    $result = $db->query($sql);
    if($db->num_rows($result)){
      $user = $db->fetch_assoc($result);
      $password_request = sha1($password);
      if($password_request === $user['password'] ){
        return $user['id'];
      }
    }
   return false;
  }
  /*--------------------------------------------------------------*/
  /* Login with the data provided in $_POST,
  /* coming from the login_v2.php form.
  /* If you used this method then remove authenticate function.
 /*--------------------------------------------------------------*/
   function authenticate_v2($username='', $password='') {
     global $db;
     $username = $db->escape($username);
     $password = $db->escape($password);
     $sql  = sprintf("SELECT id,username,password,user_level FROM users WHERE username ='%s' LIMIT 1", $username);
     $result = $db->query($sql);
     if($db->num_rows($result)){
       $user = $db->fetch_assoc($result);
       $password_request = sha1($password);
       if($password_request === $user['password'] ){
         return $user;
       }
     }
    return false;
   }


  /*--------------------------------------------------------------*/
  /* Find current log in user by session id
  /*--------------------------------------------------------------*/
  function current_user(){
      static $current_user;
      global $db;
      if(!$current_user){
         if(isset($_SESSION['user_id'])):
             $user_id = intval($_SESSION['user_id']);
             $current_user = find_by_id('users',$user_id);
        endif;
      }
    return $current_user;
  }
  /*--------------------------------------------------------------*/
  /* Find all user by
  /* Joining users table and user gropus table
  /*--------------------------------------------------------------*/
  function find_all_user(){
      global $db;
      $results = array();
      $sql = "SELECT u.id,u.name,u.username,u.user_level,u.status,u.last_login,";
      $sql .="g.group_name ";
      $sql .="FROM users u ";
      $sql .="LEFT JOIN user_groups g ";
      $sql .="ON g.group_level=u.user_level ORDER BY u.name ASC";
      $result = find_by_sql($sql);
      return $result;
  }
  /*--------------------------------------------------------------*/
  /* Function to update the last log in of a user
  /*--------------------------------------------------------------*/

 function updateLastLogIn($user_id)
	{
		global $db;
    $date = make_date();
    $sql = "UPDATE users SET last_login='{$date}' WHERE id ='{$user_id}' LIMIT 1";
    $result = $db->query($sql);
    return ($result && $db->affected_rows() === 1 ? true : false);
	}

  /*--------------------------------------------------------------*/
  /* Find all Group name
  /*--------------------------------------------------------------*/
  function find_by_groupName($val)
  {
    global $db;
    $sql = "SELECT group_name FROM user_groups WHERE group_name = '{$db->escape($val)}' LIMIT 1";
    $result = $db->query($sql);
    return($db->num_rows($result) === 0 ? true : false);
  }
  /*--------------------------------------------------------------*/
  /* Find group level
  /*--------------------------------------------------------------*/
  function find_by_groupLevel($level)
  {
    global $db;
    $sql = "SELECT group_level FROM user_groups WHERE group_level = '{$db->escape($level)}' LIMIT 1";
    $result = $db->query($sql);
    return($db->num_rows($result) === 0 ? true : false);
  }
  /*--------------------------------------------------------------*/
  /* Function for cheaking which user level has access to page
  /*--------------------------------------------------------------*/
   function page_require_level($require_level){
     global $session;
     $current_user = current_user();
     $login_level = find_by_groupLevel($current_user['user_level']);
     //if user not login
     if (!$session->isUserLoggedIn(true)):
            $session->msg('d','Please login...');
            redirect('index.php', false);
      //if Group status Deactive
     elseif($login_level['group_status'] = "0"):
           $session->msg('d','This level user has been band!');
           redirect('home.php', false);
      //cheackin log in User level and Require level is Less than or equal to
     elseif($current_user['user_level'] <= (int)$require_level):
              return true;
      else:
            $session->msg("d", "Sorry! you dont have permission to view the page.");
            redirect('home.php', false);
        endif;

     }
   /*--------------------------------------------------------------*/
   /* Function for Finding all product name
   /* JOIN with categorie  and media database table
   /*--------------------------------------------------------------*/
  function join_product_table(){
     global $db;
     $sql  =" SELECT p.id,p.name,p.quantity,p.buy_price,p.sale_price,p.media_id,p.date,c.name";
    $sql  .=" AS categorie,m.file_name AS image";
    $sql  .=" FROM products p";
    $sql  .=" LEFT JOIN categories c ON c.id = p.categorie_id";
    $sql  .=" LEFT JOIN media m ON m.id = p.media_id";
    $sql  .=" ORDER BY p.id ASC";
    return find_by_sql($sql);
   }
   //==================================================================================================================
   /*--------------------------------------------------------------*/
   /* Function for Finding all item name
   /* JOIN with category  and media database table
   /*--------------------------------------------------------------*/
  function join_cookery_table(){
    global $db;
    $sql  =" SELECT k.id,k.serialno,k.name,k.quantity,k.description,k.media_id,k.date_time,k.damage_item,k.remarks,c.name";
   $sql  .=" AS category,m.file_name AS image";
   $sql  .=" FROM cookery k";
   $sql  .=" LEFT JOIN categories c ON c.id = k.category_id";
   $sql  .=" LEFT JOIN media m ON m.id = k.media_id";
   $sql  .=" ORDER BY k.id ASC";
   return find_by_sql($sql);
  }

  /*--------------------------------------------------------------*/
   /* Function for Finding all item name
   /* JOIN with category  and media database table
   /*--------------------------------------------------------------*/
   function join_foodbev_table(){
    global $db;
    $sql  =" SELECT f.id,f.serialno,f.name,f.quantity,f.description,f.media_id,f.date_time,f.damage_item,f.remarks,c.name";
   $sql  .=" AS category,m.file_name AS image";
   $sql  .=" FROM foodbev f";
   $sql  .=" LEFT JOIN categories c ON c.id = f.category_id";
   $sql  .=" LEFT JOIN media m ON m.id = f.media_id";
   $sql  .=" ORDER BY f.id ASC";
   return find_by_sql($sql);
  }

  /*--------------------------------------------------------------*/
   /* Function for Finding all item name
   /* JOIN with category  and media database table
   /*--------------------------------------------------------------*/
   function join_pastry_table(){
    global $db;
    $sql  =" SELECT p.id,p.serialno,p.name,p.quantity,p.description,p.media_id,p.date_time,p.damage_item,p.remarks,c.name";
   $sql  .=" AS category,m.file_name AS image";
   $sql  .=" FROM pastry p";
   $sql  .=" LEFT JOIN categories c ON c.id = p.category_id";
   $sql  .=" LEFT JOIN media m ON m.id = p.media_id";
   $sql  .=" ORDER BY p.id ASC";
   return find_by_sql($sql);
  }

/*--------------------------------------------------------------*/
   /* Function for Finding all item name
   /* JOIN with category  and media database table
   /*--------------------------------------------------------------*/
   function join_bartending_table(){
    global $db;
    $sql  =" SELECT b.id,b.serialno,b.name,b.brand,b.quantity,b.date_time,b.expiry_date,b.description,b.media_id,b.damage_item,b.remarks,c.name";
   $sql  .=" AS category,m.file_name AS image";
   $sql  .=" FROM bartending b";
   $sql  .=" LEFT JOIN categories c ON c.id = b.category_id";
   $sql  .=" LEFT JOIN media m ON m.id = b.media_id";
   $sql  .=" ORDER BY b.id ASC";
   return find_by_sql($sql);
  }

  /*--------------------------------------------------------------*/
   /* Function for Finding all item name
   /* JOIN with category  and media database table
   /*--------------------------------------------------------------*/
   function join_housekeeping_table(){
    global $db;
    $sql  =" SELECT h.id,h.serialno,h.name,h.quantity,h.date_time,h.description,h.media_id,h.damage_item,h.remarks,c.name";
   $sql  .=" AS category,m.file_name AS image";
   $sql  .=" FROM housekeeping h";
   $sql  .=" LEFT JOIN categories c ON c.id = h.category_id";
   $sql  .=" LEFT JOIN media m ON m.id = h.media_id";
   $sql  .=" ORDER BY h.id ASC";
   return find_by_sql($sql);
  }

  /*--------------------------------------------------------------*/
   /* Function for Finding all item name
   /* JOIN with category  and media database table
   /*--------------------------------------------------------------*/
   function join_frontoffices_table(){
    global $db;
    $sql  =" SELECT o.id,o.serialno,o.name,o.quantity,o.date_time,o.description,o.media_id,o.damage_item,o.remarks,c.name";
   $sql  .=" AS category,m.file_name AS image";
   $sql  .=" FROM frontoffices o";
   $sql  .=" LEFT JOIN categories c ON c.id = o.category_id";
   $sql  .=" LEFT JOIN media m ON m.id = o.media_id";
   $sql  .=" ORDER BY o.id ASC";
   return find_by_sql($sql);
  }

  /*--------------------------------------------------------------*/
   /* Function for Finding all item name
   /* JOIN with category  and media database table
   /*--------------------------------------------------------------*/
   function join_barista_table(){
    global $db;
    $sql  =" SELECT t.id,t.serialno,t.name,t.brand,t.quantity,t.date_time,t.expiry_date,t.description,t.media_id,t.damage_item,t.remarks,c.name";
   $sql  .=" AS category,m.file_name AS image";
   $sql  .=" FROM barista t";
   $sql  .=" LEFT JOIN categories c ON c.id = t.category_id";
   $sql  .=" LEFT JOIN media m ON m.id = t.media_id";
   $sql  .=" ORDER BY t.id ASC";
   return find_by_sql($sql);
  }

  /*--------------------------------------------------------------*/
   /* Function for Fetching activity log
   /* JOIN with activitylog and user database table
   /*--------------------------------------------------------------*/
   function join_activitylog_table(){
    global $db;
    $sql  =" SELECT a.id,a.name,a.action,a.quantity_added,a.ip,a.updated_at,a.purchase_date";
   $sql  .=" FROM activitylog a";
   $sql  .=" ORDER BY a.id DESC";
   return find_by_sql($sql);
  }

/*--------------------------------------------------------------*/
  /* Function for Display Recent Cookery Item Added
  /*--------------------------------------------------------------*/
  function find_recent_cookery_added($limit){
    global $db;
    $sql  =" SELECT k.id,k.serialno,k.name,k.quantity,k.description,k.media_id,k.date_time,k.damage_item,k.remarks,c.name";
   $sql  .=" AS category,m.file_name AS image";
   $sql  .=" FROM cookery k";
   $sql  .=" LEFT JOIN categories c ON c.id = k.category_id";
   $sql  .=" LEFT JOIN media m ON m.id = k.media_id";
    $sql  .= " ORDER BY k.id DESC LIMIT ".$db->escape((int)$limit);
    return find_by_sql($sql);
  }


  /*--------------------------------------------------------------*/
  /* Function for Display Recent Food & Beverages Item Added
  /*--------------------------------------------------------------*/
  function find_recent_foodbev_added($limit){
    global $db;
    $sql  =" SELECT f.id,f.serialno,f.name,f.quantity,f.description,f.media_id,f.date_time,f.damage_item,f.remarks,c.name";
   $sql  .=" AS category,m.file_name AS image";
   $sql  .=" FROM foodbev f";
   $sql  .=" LEFT JOIN categories c ON c.id = f.category_id";
   $sql  .=" LEFT JOIN media m ON m.id = f.media_id";
    $sql  .= " ORDER BY f.id DESC LIMIT ".$db->escape((int)$limit);
    return find_by_sql($sql);
  }


  /*--------------------------------------------------------------*/
  /* Function for Display Recent Bread & Pastry Item Added
  /*--------------------------------------------------------------*/
  function find_recent_pastry_added($limit){
    global $db;
    $sql  =" SELECT p.id,p.serialno,p.name,p.quantity,p.description,p.media_id,p.date_time,p.damage_item,p.remarks,c.name";
   $sql  .=" AS category,m.file_name AS image";
   $sql  .=" FROM pastry p";
   $sql  .=" LEFT JOIN categories c ON c.id = p.category_id";
   $sql  .=" LEFT JOIN media m ON m.id = p.media_id";
    $sql  .= " ORDER BY p.id DESC LIMIT ".$db->escape((int)$limit);
    return find_by_sql($sql);
  }

  /*--------------------------------------------------------------*/
  /* Function for Display Recent Bartending Item Added
  /*--------------------------------------------------------------*/
  function find_recent_bartending_added($limit){
    global $db;
    $sql  =" SELECT b.id,b.serialno,b.name,b.brand,b.quantity,b.date_time,b.expiry_date,b.description,b.media_id,b.damage_item,b.remarks,c.name";
   $sql  .=" AS category,m.file_name AS image";
   $sql  .=" FROM bartending b";
   $sql  .=" LEFT JOIN categories c ON c.id = b.category_id";
   $sql  .=" LEFT JOIN media m ON m.id = b.media_id";
    $sql  .= " ORDER BY b.id DESC LIMIT ".$db->escape((int)$limit);
    return find_by_sql($sql);
  }

  /*--------------------------------------------------------------*/
  /* Function for Display Recent Housekeeping Item Added
  /*--------------------------------------------------------------*/
  function find_recent_housekeeping_added($limit){
    global $db;
    $sql  =" SELECT h.id,h.serialno,h.name,h.quantity,h.description,h.media_id,h.date_time,h.damage_item,h.remarks,c.name";
   $sql  .=" AS category,m.file_name AS image";
   $sql  .=" FROM housekeeping h";
   $sql  .=" LEFT JOIN categories c ON c.id = h.category_id";
   $sql  .=" LEFT JOIN media m ON m.id = h.media_id";
    $sql  .= " ORDER BY h.id DESC LIMIT ".$db->escape((int)$limit);
    return find_by_sql($sql);
  }

  /*--------------------------------------------------------------*/
  /* Function for Display Recent Front Offices Item Added
  /*--------------------------------------------------------------*/
  function find_recent_frontoffices_added($limit){
    global $db;
    $sql  =" SELECT o.id,o.serialno,o.name,o.quantity,o.description,o.media_id,o.date_time,o.damage_item,o.remarks,c.name";
   $sql  .=" AS category,m.file_name AS image";
   $sql  .=" FROM frontoffices o";
   $sql  .=" LEFT JOIN categories c ON c.id = o.category_id";
   $sql  .=" LEFT JOIN media m ON m.id = o.media_id";
    $sql  .= " ORDER BY o.id DESC LIMIT ".$db->escape((int)$limit);
    return find_by_sql($sql);
  }

  /*--------------------------------------------------------------*/
  /* Function for Display Recent Barista Item Added
  /*--------------------------------------------------------------*/
  function find_recent_barista_added($limit){
    global $db;
    $sql  =" SELECT t.id,t.serialno,t.name,t.brand,t.quantity,t.date_time,t.expiry_date,t.description,t.media_id,t.damage_item,t.remarks,c.name";
   $sql  .=" AS category,m.file_name AS image";
   $sql  .=" FROM barista t";
   $sql  .=" LEFT JOIN categories c ON c.id = t.category_id";
   $sql  .=" LEFT JOIN media m ON m.id = t.media_id";
    $sql  .= " ORDER BY t.id DESC LIMIT ".$db->escape((int)$limit);
    return find_by_sql($sql);
  }



  //==================================================================================================================

  /*--------------------------------------------------------------*/
  /* Function for Finding all product name
  /* Request coming from ajax.php for auto suggest
  /*--------------------------------------------------------------*/

   function find_product_by_title($product_name){
     global $db;
     $p_name = remove_junk($db->escape($product_name));
     $sql = "SELECT name FROM products WHERE name like '%$p_name%' LIMIT 5";
     $result = find_by_sql($sql);
     return $result;
   }

  /*--------------------------------------------------------------*/
  /* Function for Finding all product info by product title
  /* Request coming from ajax.php
  /*--------------------------------------------------------------*/
  function find_all_product_info_by_title($title){
    global $db;
    $sql  = "SELECT * FROM products ";
    $sql .= " WHERE name ='{$title}'";
    $sql .=" LIMIT 1";
    return find_by_sql($sql);
  }

  /*--------------------------------------------------------------*/
  /* Function for Update product quantity
  /*--------------------------------------------------------------*/
  function update_product_qty($qty,$p_id){
    global $db;
    $qty = (int) $qty;
    $id  = (int)$p_id;
    $sql = "UPDATE products SET quantity=quantity -'{$qty}' WHERE id = '{$id}'";
    $result = $db->query($sql);
    return($db->affected_rows() === 1 ? true : false);

  }
  /*--------------------------------------------------------------*/
  /* Function for Display Recent product Added
  /*--------------------------------------------------------------*/
 function find_recent_product_added($limit){
   global $db;
   $sql   = " SELECT p.id,p.name,p.sale_price,p.media_id,c.name AS categorie,";
   $sql  .= "m.file_name AS image FROM products p";
   $sql  .= " LEFT JOIN categories c ON c.id = p.categorie_id";
   $sql  .= " LEFT JOIN media m ON m.id = p.media_id";
   $sql  .= " ORDER BY p.id DESC LIMIT ".$db->escape((int)$limit);
   return find_by_sql($sql);
 }
 /*--------------------------------------------------------------*/
 /* Function for Find Highest saleing Product
 /*--------------------------------------------------------------*/
 function find_higest_saleing_product($limit){
   global $db;
   $sql  = "SELECT p.name, COUNT(s.product_id) AS totalSold, SUM(s.qty) AS totalQty";
   $sql .= " FROM sales s";
   $sql .= " LEFT JOIN products p ON p.id = s.product_id ";
   $sql .= " GROUP BY s.product_id";
   $sql .= " ORDER BY SUM(s.qty) DESC LIMIT ".$db->escape((int)$limit);
   return $db->query($sql);
 }
 /*--------------------------------------------------------------*/
 /* Function for find all sales
 /*--------------------------------------------------------------*/
 function find_all_sale(){
   global $db;
   $sql  = "SELECT s.id,s.qty,s.price,s.date,p.name";
   $sql .= " FROM sales s";
   $sql .= " LEFT JOIN products p ON s.product_id = p.id";
   $sql .= " ORDER BY s.date DESC";
   return find_by_sql($sql);
 }
 /*--------------------------------------------------------------*/
 /* Function for Display Recent sale
 /*--------------------------------------------------------------*/
function find_recent_sale_added($limit){
  global $db;
  $sql  = "SELECT s.id,s.qty,s.price,s.date,p.name";
  $sql .= " FROM sales s";
  $sql .= " LEFT JOIN products p ON s.product_id = p.id";
  $sql .= " ORDER BY s.date DESC LIMIT ".$db->escape((int)$limit);
  return find_by_sql($sql);
}
/*--------------------------------------------------------------*/
/* Function for Generate sales report by two dates
/*--------------------------------------------------------------*/
function find_sale_by_dates($start_date,$end_date){
  global $db;
  $start_date  = date("Y-m-d", strtotime($start_date));
  $end_date    = date("Y-m-d", strtotime($end_date));
  $sql  = "SELECT s.date, p.name,p.sale_price,p.buy_price,";
  $sql .= "COUNT(s.product_id) AS total_records,";
  $sql .= "SUM(s.qty) AS total_sales,";
  $sql .= "SUM(p.sale_price * s.qty) AS total_saleing_price,";
  $sql .= "SUM(p.buy_price * s.qty) AS total_buying_price ";
  $sql .= "FROM sales s ";
  $sql .= "LEFT JOIN products p ON s.product_id = p.id";
  $sql .= " WHERE s.date BETWEEN '{$start_date}' AND '{$end_date}'";
  $sql .= " GROUP BY DATE(s.date),p.name";
  $sql .= " ORDER BY DATE(s.date) DESC";
  return $db->query($sql);
}
/*--------------------------------------------------------------*/
/* Function for Generate Daily sales report
/*--------------------------------------------------------------*/
function  dailySales($year,$month){
  global $db;
  $sql  = "SELECT s.qty,";
  $sql .= " DATE_FORMAT(s.date, '%Y-%m-%e') AS date,p.name,";
  $sql .= "SUM(p.sale_price * s.qty) AS total_saleing_price";
  $sql .= " FROM sales s";
  $sql .= " LEFT JOIN products p ON s.product_id = p.id";
  $sql .= " WHERE DATE_FORMAT(s.date, '%Y-%m' ) = '{$year}-{$month}'";
  $sql .= " GROUP BY DATE_FORMAT( s.date,  '%e' ),s.product_id";
  return find_by_sql($sql);
}
/*--------------------------------------------------------------*/
/* Function for Generate Monthly sales report
/*--------------------------------------------------------------*/
function  monthlySales($year){
  global $db;
  $sql  = "SELECT s.qty,";
  $sql .= " DATE_FORMAT(s.date, '%Y-%m-%e') AS date,p.name,";
  $sql .= "SUM(p.sale_price * s.qty) AS total_saleing_price";
  $sql .= " FROM sales s";
  $sql .= " LEFT JOIN products p ON s.product_id = p.id";
  $sql .= " WHERE DATE_FORMAT(s.date, '%Y' ) = '{$year}'";
  $sql .= " GROUP BY DATE_FORMAT( s.date,  '%c' ),s.product_id";
  $sql .= " ORDER BY date_format(s.date, '%c' ) ASC";
  return find_by_sql($sql);
}
?>
