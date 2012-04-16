<?php
/*
 * @version $Id: HEADER 14684 2011-06-11 06:32:40Z remi $
 -------------------------------------------------------------------------
 ocinventoryng - TreeView browser plugin for GLPI
 Copyright (C) 2012 by the ocinventoryng Development Team.

 https://forge.indepnet.net/projects/ocinventoryng
 -------------------------------------------------------------------------

 LICENSE

 This file is part of ocinventoryng.

 ocinventoryng is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 ocinventoryng is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with ocinventoryng; If not, see <http://www.gnu.org/licenses/>.
 --------------------------------------------------------------------------
 */

if (!defined('GLPI_ROOT')) {
   define('GLPI_ROOT', '../../..');
}
include (GLPI_ROOT . "/inc/includes.php");

$dropdown = new PluginOcsinventoryngNotimported();

if (isset($_POST['action'])) {
   switch ($_POST['action']) {
      case 'plugin_ocsinventoryng_import' :
         $_POST['force'] = true;

      case 'plugin_ocsinventoryng_replayrules' :
         if (PluginOcsinventoryngNotimported::computerImport($_POST)) {
            $dropdown->redirectToList();
         } else {
            Html::redirect(Html::getItemTypeFormURL('PluginOcsinventoryngNotimported').
                           '?id='.$_POST['id']);
         }
         break;

      case 'plugin_ocsinventoryng_link' :
         $dropdown->linkComputer($_POST);
         $dropdown->redirectToList();
         break;
   }
}

include (GLPI_ROOT . "/front/dropdown.common.form.php");
?>