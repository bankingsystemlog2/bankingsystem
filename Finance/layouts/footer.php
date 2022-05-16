
</div>
</div>

<script>
  $(document).ready(function(){
    window.uni_modal = function($title = '' , $url='',$size=""){
        start_loader()
        $.ajax({
            url:$url,
            error:err=>{
                console.log()
                alert("An error occured")
            },
            success:function(resp){
                if(resp){
                    $('#uni_modal .modal-title').html($title)
                    $('#uni_modal .modal-body').html(resp)
                    if($size != ''){
                        $('#uni_modal .modal-dialog').addClass($size+'  modal-dialog-centered')
                    }else{
                        $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md modal-dialog-centered")
                    }
                    $('#uni_modal').modal({
                      show:true,
                      backdrop:'static',
                      keyboard:false,
                      focus:true
                    })
                    end_loader()
                }
            }
        })
    }
    window._conf = function($msg='',$func='',$params = []){
       $('#confirm_modal #confirm').attr('onclick',$func+"("+$params.join(',')+")")
       $('#confirm_modal .modal-body').html($msg)
       $('#confirm_modal').modal('show')
    }
  })
</script>
</main>
    <!-- All Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    <script src="./libs/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./libs/js/jquery-3.5.1.js"></script>
    <script src="./libs/js/jquery.dataTables.min.js"></script>
    <script src="./libs/js/dataTables.bootstrap5.min.js"></script>
    <script src="./libs/js/dataTables.buttons.min.js"></script>
    <script src="./libs/js/pdfmake.min.js"></script>
    <script src="./libs/js/vfs_fonts.js"></script>
    <script src="./libs/js/buttons.html5.min.js"></script>
    <script src="./libs/js/buttons.print.min.js"></script>
    <script src="./libs/js/jszip.min.js"></script>
    <script src="./libs/js/script.js"></script>

    <script src="./libs/js/calendar-2/moment.latest.min.js"></script>
    <!-- scripit init-->
    <script src="./libs/js/calendar-2/semantic.ui.min.js"></script>
    <!-- scripit init-->
    <script src="./libs/js/calendar-2/prism.min.js"></script>
    <!-- scripit init-->
    <script src="./libs/js/calendar-2/pignose.calendar.min.js"></script>
    <!-- scripit init-->
    <script src="./libs/js/calendar-2/pignose.init.js"></script>

   <!-- End of Script Links -->

  </body>
</html>

<?php if(isset($db)) { $db->db_disconnect(); } ?>
