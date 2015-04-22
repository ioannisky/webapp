<?php
	
	class ShoppingList extends DatabaseObject
	{
		protected static $_tablename="shopping_list";
		protected static $_resource="demoapp";

		
		
		function getListItems()
		{
			return ShoppingListItem::find("fk_shopping_list_id=? ORDER BY id ASC",array($this->id));
		}



		static function getLatestShoppingList()
		{
			return ShoppingList::load("date_finished IS NOT null ORDER BY date_created DESC LIMIT 1");
		}


	}

?>
