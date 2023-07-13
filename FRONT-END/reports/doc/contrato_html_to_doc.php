<?php
// Load library 
include_once 'config_class.php';  
 
// Initialize class 
$htd = new HTML_TO_DOC();

$htmlContent = ' 
    <h1>Contrato</h1> 
    <p style="color:red">Este é um exemplo do contrato.</p>
    <p>_______________________</p>
    <small>assinatura</small>
';


// to create a file
// $htd->createDoc($htmlContent, "my-document");

// to create and download the file
$htd->createDoc($htmlContent, "Contrato", 1);

// Create Word Document from HTML File
// $htd->createDoc("source.html", "my-document");
