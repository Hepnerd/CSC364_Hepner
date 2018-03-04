<?php
include('../includes/application_includes.php');
include("../templates/layout.php");
include("../templates/products.php");

layout::pageTop("Hepner's Haggles");
product::products();
layout::pageBottom();
