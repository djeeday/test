<style>
    a:link,
    a:visited
    {
        color: #0398CA;
    }

    span#zf-name
    {
        color: #91BE3F;
    }

    div#welcome
    {
        color: #FFFFFF;
        background-image: url(http://framework.zend.com/images/bkg_header.jpg);
        width:  100%;
        height: 100%;
        border: 2px solid #444444;
        overflow: scroll;
        text-align: center;
    }

    div#message
    {
        background-image: url(http://framework.zend.com/images/bkg_body-bottom.gif);
        /* height: 100%; */
    }
</style>
<div id="welcome">
<h1><?php echo $this->title ?></h1>
    <div id="name"> 
        <?php if(is_array($this->message)):?>
            <ul>
            <?php foreach($this->message as $message) :?>
                <li><?php echo $this->escape($message)?></li>
            <?php endforeach;?>
            </ul>
        <?php endif;?>
        <p><?php echo $this->escape($this->formatCurrency($this->numbers))?></p>
    </div>
<?php
$db = Zend_Registry::get('db');
$tablesQ = $db->query('Show tables');
$tables = $tablesQ->fetchAll();
var_dump($tables );
// var_dump(Zend_Registry::getInstance());
?>
</div>

