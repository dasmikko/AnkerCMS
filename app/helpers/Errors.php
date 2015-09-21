<?php 
/**
 *  This class is for displayer 404 like error pages!
 */
class Errors extends Helpers {

    public static function error($error_code)
    {
        //show 404 page
        $view = View::make('errors.'.$error_code);

        $view->page_title = "Page was not found!";
        $view->page_description = "Sorry, the page could not be found...";
        $view->menu = Page::getPagesMenu();

        return $view;
    }
}