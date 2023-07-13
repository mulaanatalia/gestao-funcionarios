<?php
// Load library 
include_once 'config_class.php';  
 
// Initialize class 
$htd = new HTML_TO_DOC();

$htmlContent = ' 
    <h1>Hello World!</h1> 
    <p>This document is created from HTML.</p>';


// to create a file
// $htd->createDoc($htmlContent, "my-document");

// to create and download the file
$htd->createDoc($htmlContent, "my-document", 1);

// Create Word Document from HTML File
// $htd->createDoc("source.html", "my-document");
