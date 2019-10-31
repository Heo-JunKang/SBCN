<?php
class Premium_404 extends CI_Controller
{
    function index()
    {
        header("location: /");
        exit;
    }
}