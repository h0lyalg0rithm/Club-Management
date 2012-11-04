<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'clubs';
$connection = mysql_connect($hostname,$username,$password);
if(!$connection){
    die('Cant connect to DB');
}
mysql_select_db($database);
if($_GET['install']=='1'){
    ////////Add User table
    $add_user_table = 'CREATE table users (
                               id int auto_increment primary key,
                               name text,
                               student_id int ,
                               email text,
                               password char(64)
                        )';
    $user_table = mysql_query($add_user_table);
    if(!$user_table){
        die('Table User already exists');
    }
    //////////Add Admin Users
    $add_admin_users_table = 'CREATE table admin(
                                    id int auto_increment primary key,
                                    studid int,
                                    clubid int
                              )';
    $admin_users_table = mysql_query($add_admin_users_table);
    if(!$admin_users_table){
        die('Table Admin User already exists');
    }
    /////////Add events
    $add_events_table = 'CREATE table events(
                                    id int auto_increment primary key,
                                    clubid int,
                                    name text,
                                    type int,
                                    details text,
                                    photo text,
                                    wheres text,
                                    whens datetime,
                                    attendees text
                              )';
    $events_table = mysql_query($add_events_table);
    if(!$events_table){
        die('Table events already exists');
    }
    //////////Add Clubs
    $add_clubs_table = 'CREATE table clubs(
                                    id int auto_increment primary key,
                                    photo text,
                                    name text,
                                    description text
                              )';
    $clubs_table = mysql_query($add_clubs_table);
    if(!$clubs_table){
        die('Table clubs already exists');
    }
    ///////////Add requests
    $add_requests_table = 'CREATE table requests(
                                    id int auto_increment primary key,
                                    studid int,
                                    clubid int
                              )';
    $requests_table = mysql_query($add_requests_table);
    if(!$requests_table){
        die('Table requests already exists');
    }
    ////////////Add membership
    $add_membership_table = 'CREATE table membership(
                                    id int auto_increment primary key,
                                    studid int,
                                    clubid int
                              )';
    $membership_table = mysql_query($add_membership_table);
    if(!$membership_table){
        die('Table membership already exists');
    }
    echo 'Done';
}
if($_GET['install']=='0'){
    ////////Add User table
    $drop_user_table = 'DROP TABLE users';
    $user_table = mysql_query($drop_user_table);
    if(!$user_table){
        die('Table User does not exists');
    }
    $drop_admin_users_table = 'DROP TABLE admin';
    $admin_users_table = mysql_query($drop_admin_users_table);
    if(!$admin_users_table){
        die('Table Admin User does not exists');
    }
    $drop_events_table = 'DROP TABLE events';
    $events_table = mysql_query($drop_events_table);
    if(!$events_table){
        die('Table Events does not exists');
    }
    $drop_clubs_table = 'DROP TABLE clubs';
    $clubs_table = mysql_query($drop_clubs_table);
    if(!$clubs_table){
        die('Table Clubs does not exists');
    }
    $drop_requests_table = 'DROP TABLE requests';
    $requests_table = mysql_query($drop_requests_table);
    if(!$requests_table){
        die('Table Requests does not exists');
    }
    $drop_membership_table = 'DROP TABLE membership';
    $membership_table = mysql_query($drop_membership_table);
    if(!$membership_table){
        die('Table Membership does not exists');
    }
    echo 'Done';
}
?>