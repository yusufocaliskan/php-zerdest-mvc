<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASEPATH?>themes/admin/Falcon/css/master.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet"> 
    <title><?php echo $title; ?></title>
</head>
<body>

<div class="wrapper">
    <header>
        <div class="row">
            <div class="col-4">Logo(SiteAdı)</div>
            <div class="col-4">
                <form action="">
                    <input type="text" name="search">
                    <button>Search</button>
                </form>
            </div>
        </div>
    </header>

    <div class="main">
        <div class="row">
            <div class="col-4 left-side">
                <div class="left-menu">
                    <ul>
                        <li><a href="#">Homepage</a></li>
                        <li><a href="#">create_new_database</a></li>
                        <li><a href="/users/add_form">Users</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-8 right-side">
           