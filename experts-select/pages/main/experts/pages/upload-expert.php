<div class= "container main"> 

        <div class="col-md-12 mb25">              
        	<h3 class="textshadow" >Upload a Document</h3><div class="title-divider"></div>
    	</div>  


    <div class = "col-md-12 mb25">
        <div class = "col-lg-6">  
            <p>To upload a document simply click 'choose file' and select your document. 
            We only accept PDF and DOC files. You can have a maximum of ten files uploaded.
            To free up space use the delete button.</p>
            
                <ul class="fa-ul">
                    <li><i class="fa-li fa fa-lg fa-eye"></i> View File - Check the file you have uploaded</li>
                    <li><i class="fa-li fa fa-lg fa-envelope"></i> Send File - Forward the file to another user</li>
                    <li><i class="fa-li fa fa-lg fa-trash-o"></i> Delete File - Remove the file from the list</li>
                    <li><i class="fa-li fa fa-lg fa-star-o"></i> Set Default - This will appear when you show up in lists for MROs to see</li>
                </ul>


    
			</div>
            
            <div class = "col-md-6">
            
            	<div class = "col-md-12">
                        <div class="panel panel-default">
                          <div class="panel-heading">Documents</div>

                          <div class="panel-body">
                            <div class = "col-md-12">
 
                            
					<table border="1" class = "tg table midd">
                     <tr>
                     <td><h4>File Name</h4></td>
                     <td><h4>Action</h4></td>
                     </tr>   
						<?php							
                            $nameID = $_SESSION['CME_USER']['login_id'];
                            $dir = "uploads/expert/".$nameID."/";
                            
                            // Read content directory
                            if (is_dir($dir)){
                              if ($dh = opendir($dir)){
                                while (($file = readdir($dh)) !== false){
                                    if ($file!="."&&$file!="..") {
            							$fileCounter++;
                                        $ext = pathinfo($file, PATHINFO_EXTENSION);
            								
											//Creates icons according to file type
                                            if ($ext == pdf || $ext == PDF){$fileIcon = "<i class='fa fa-lg fa-file-pdf-o'></i>";}
                                            elseif ($ext == doc || $ext == DOC){$fileIcon = "<i class='fa fa-lg fa-file-word-o'></i>";}
                                            else {$fileIcon = "<i class='fa fa-lg fa-file-text-o'></i>";}
											
											//Show title and icon
											echo "<tr><td><a target = '_blank' href = ".$dir.$file.">";
												echo $file." ".$fileIcon;
											echo "</a></td>";
											
											//Slap it in a table
											?> 
                                                <td>
                                                
                                                    <div class="btn-group" role="group">
                                                    
                                                        <form style = "display:inline">   
                                                            <a  target = '_blank' href = "<?php echo $dir.$file ?>" class = "btn btn-default btn-sm" title="View File"><i class="fa fa-lg fa-eye"></i></a></a>
                                                        </form>
                                                        
                                                        <form style = "display:inline" method="POST" action="index.php?page=upload-expert-send">   
                                                            <button class = "btn btn-default btn-sm" title="Send File"><i class="fa fa-lg fa-envelope"></i></a></button>
                                                        </form>
                                                                                                               
                                                        <form style = "display:inline" method="POST" action="index.php?page=upload-expert-delete">   
                                                            <input type="hidden" name="file-to-delete" id="file-to-delete" value="<?php echo $file ?>" />        
                                                            <button class = "btn btn-default btn-sm" title="Delete File" 
                                                            onclick="return confirm('Delete <?php echo $file ?>?')">
                                                            <i class="fa fa-lg fa-trash-o"></i></a></button>
                                                        </form>
                                                        
                                                        <form style = "display:inline" method="POST" action="index.php?page=upload-expert-default">   
                                                            <button class = "btn btn-default btn-sm" title="Set Default"><i class="fa fa-lg fa-star-o"></i></a></button>
                                                        </form>
                                                        
                                                    </div>                                                

                                                </td>
                                            </tr>
											<?php
                                    }
                                }
                                closedir($dh);
                              }
                            }
                        ?>
                        </tr>
                    </table>

            <form class = "mt25" action="index.php?page=upload-expert-action" method="post" enctype="multipart/form-data">
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="hidden" name="fileCounter" id="fileCounter" value="<?php echo $fileCounter ?>" />
                <button class = "btn btn-success mt25" type="submit" value="Upload Document" name="submit">Upload &nbsp;<i class="fa fa-upload fa-lg"></i></button>
            </form>



                        </div>
                </div>
      
            </div>
            

            </div>
            
            <!--
            	<div class = "col-sm-3"></div>
                <div class = "col-lg-3"> 
                
                
                     <table border="1" class = "tg table midd">
                        <tr>
                            <td><h4>Your Docs</h4></td>
                            <td><h4>Actions</h4></td>
                        </tr>
                        <tr>
                            <td><a href = "#"><label>my-CV.PDF</label>&nbsp;<i class="fa fa-file-pdf-o"></i></a><br /></td>
                            <td>
                                <abbr title="Delete File"><i class="fa fa-trash-o"></i></a></abbr>
                                <abbr title="Send File"><i class="fa fa-envelope"></i></a></abbr><br />
                                <abbr title="View File"><i class="fa fa-eye"></i></a></abbr>
                            </td>
                        </tr>
                        <tr>
                            <td><a href = "#"><label>my-CV.PDF</label>&nbsp;<i class="fa fa-file-pdf-o"></i></a><br /></td>
                            <td>
                                <abbr title="Delete File"><i class="fa fa-trash-o"></i></a></abbr>
                                <abbr title="Send File"><i class="fa fa-envelope"></i></a></abbr><br />
                                <abbr title="View File"><i class="fa fa-eye"></i></a></abbr>
                            </td>
                        </tr>
                        <tr>
                            <td><a href = "#"><label>my-CV.doc</label>&nbsp;<i class="fa fa-file-word-o"></i></a><br /></td>
                            <td>
                                <abbr title="Delete File"><i class="fa fa-trash-o"></i></a></abbr>
                                <abbr title="Send File"><i class="fa fa-envelope"></i></a></abbr><br />
                                <abbr title="View File"><i class="fa fa-eye"></i></a></abbr>
                            </td>
                        </tr>
                    </table>
                    
                    
                </div>-->

            </div><!-- End panel -->    
        </div><!-- End container -->    
    </div>	

