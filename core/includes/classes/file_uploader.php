<?php 
class FileUploader {
    private $file;
    private $fileName;
    private $fileSize;
    private $fileType;
    private $uploadLocation;

    public function __construct($file, $uploadDir = "pass_uploads/") {
        $this->file = $file;
        $this->fileSize = $file['size'];
        $this->fileType = $file['type'];
        $this->uploadLocation = rtrim($uploadDir, '/') . '/';

        $this->ensureUploadDirectoryExists();

        // Generate a unique file name
        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $this->fileName = uniqid('passport_', true) . '.' . $extension;
    }

    private function ensureUploadDirectoryExists() {
        if (!is_dir($this->uploadLocation)) {
            if (!mkdir($this->uploadLocation, 0755, true)) {
                throw new Exception("Failed to create upload directory: " . $this->uploadLocation);
            }
        }
    }

    public function upload() {
        if ($this->file['error'] !== UPLOAD_ERR_OK) {
            return "File upload error. Code: " . $this->file['error'];
        }
    
        $allowedExtensions = ['png', 'jpg', 'jpeg', 'pdf'];
        $extension = strtolower(pathinfo($this->file['name'], PATHINFO_EXTENSION));
        if (!in_array($extension, $allowedExtensions)) {
            return "Only PNG, JPG, JPEG, and PDF files are allowed.";
        }
    
        // Check MIME type
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime  = finfo_file($finfo, $this->file['tmp_name']);
        finfo_close($finfo);
        $allowedMimeTypes = ['image/png', 'image/jpeg', 'application/pdf'];
        if (!in_array($mime, $allowedMimeTypes)) {
            return "Invalid file type.";
        }
    
        $maxFileSize = 6 * 1024 * 1024; // 6MB
        if ($this->fileSize > $maxFileSize) {
            return "File size exceeds the 6MB limit.";
        }
    
        if (!is_writable($this->uploadLocation)) {
            return "Upload directory is not writable.";
        }
    
        $uploadPath = $this->uploadLocation . $this->fileName;
    
        if (move_uploaded_file($this->file['tmp_name'], $uploadPath)) {
            return $uploadPath;
        } else {
            return "Failed to move uploaded file.";
        }
    }

    public function getFileName() {
        return $this->fileName;
    }
}
?>
