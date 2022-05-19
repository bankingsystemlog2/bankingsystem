<?php 

?>
<div class="col-md-9 mt-3">
<center><h3>Upload the following documents to view available jobs</h3></center><br>
<div class="cold-md-5" style="margin-left:35%;">

  <center><i>file extensions allowed: .jpg, .jpeg, .pdf, .docx </i></center>
    <form  method="post" action="upload-docu.php" enctype="multipart/form-data">
                                <div class="form-group row mb-3">
                                    <label for="first_name" class="col-md-3 col-form-label text-md-right">Resume</label>
                                    <div class="col-md-6">
                                        <input type="file" required id="first_name" class="form-control border border-dark" name="resume" value="">
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="middle_name" class="col-md-3 col-form-label text-md-right">SSS ID or E1 Form </label>
                                    <div class="col-md-6">
                                        <input type="file" required id="middle_name"  class="form-control border border-dark" name="sss" value="">
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="last_name" class="col-md-3 col-form-label text-md-right">Philhealth ID or Registration Form</label>
                                    <div class="col-md-6">
                                        <input type="file" required id="last_name" class="form-control border border-dark" name="phil" value="">
                                        
                                    </div>
                                    
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="email" class="col-md-3 col-form-label text-md-right">Pag-ibig ID or Registration Form</label>
                                    <div class="col-md-6">
                                        <input type="file" required id="email" class="form-control border border-dark" name="pag-ibig" value="">
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="contact" class="col-md-3 col-form-label text-md-right">NBI Clearance</label>
                                    <div class="col-md-6">
                                        <input type="file" required min="11" max="11" id="contact" class="form-control border border-dark" name="nbi" value="">
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="password" class="col-md-3 col-form-label text-md-right">Passport or Any Valid ID</label>
                                    <div class="col-md-6">
                                        <input type="file" required id="password" name="valids" class="form-control border border-dark" value="">
                                        
                                    </div>
                                </div>


                        

                         
                              
  
                                    <div class="col-md-6 offset-md-4 mt-4 mb-5">
                                      
                                        <button type="submit" name="submit" class="btn btn-primary">
                                        Upload
                                        </button>
                                    </div>
                                </div>
                            </form>
</div>
</div>


 </body>
        
    
      
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>