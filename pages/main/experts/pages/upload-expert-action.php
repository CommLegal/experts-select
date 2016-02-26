<div class= "container main"> 
    <div class="col-md-12 mb25">              
        <h3>Upload Results</h3><div class="title-divider"></div>
    </div>  
     
    <div class = "col-lg-12">  
            <div class = "col-lg-6">
                <?php
				

				
				
				
					$fileCounter = $_POST['fileCounter'];
                    echo "<p>";
					$nameID = $_SESSION['CME_USER']['login_id'];
					$sizeOfFile = $_FILES["fileToUpload"]["size"];
					
					$oldmask = umask(0);
					mkdir("uploads/expert/".$nameID."", 0777, true);
					umask($oldmask);
					
                    $target_dir = "uploads/expert/".$nameID."/";
					
                    $target_file = $target_dir . "" .basename($_FILES["fileToUpload"]["name"]);
					$target_file = str_replace(' ', '_', $target_file);
					
					//echo $target_file;
                    $uploadOk = 1;
                    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                
                    // Check if file already exists
                    if (file_exists($target_file)) {
                        echo "A file with that name already exists.<br />";
                        $uploadOk = 0;
                    }
                    // Allow certain file formats
                    if($imageFileType != "doc" && $imageFileType != "docx" && $imageFileType != "pdf" ) {
                        echo "You can only upload Word and PDF documents.<br />";
                        $uploadOk = 0;
                    }
                    // Check file size
                    if ($sizeOfFile > 4000000) {
                        echo "Files cannot be larger than 4MB.<br />";
                        $uploadOk = 0;
                    }
                    // Check file size
                    if ($fileCounter >= 10) {
                        echo "You can only upload ten documents.<br />";
                        $uploadOk = 0;
                    }
                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        echo " <br />Please try again.";
                    // if everything is ok, try to upload file
                    } 
					
					
					
					
					
					else {
                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded successfully.<br />".$sizeOfFile;
                        } else {
                            echo "<br />Sorry, there was an error uploading your file.<br />";
                        }
                    }
                    echo "</p>";
                ?>
                
                <a class = "btn btn-success mt10" href = "index.php?page=upload-expert">Back</a>
        </div>
    </div>

</div>