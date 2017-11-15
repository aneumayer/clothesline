<?php

class User extends ActiveRecord\Model
{
    static $table_name  = 'user';
    static $has_many = array(
        array('category', 'class_name' => 'Property'),
        array('subscriptions', 'class_name' => 'Subscription', ),
    );
}

?>
