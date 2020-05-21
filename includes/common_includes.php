<?php
require_once("fasttemplate/cls_fast_template.php");
require_once("config.php");
require_once("functions.php");
require_once("Database.php");

function new_tpl() {
  return new FastTemplate("templates");
}
?>
