<?php

/**
 * Contains AboutController class.
 *
 * @license http://sipmvc.mludd.se/COPYING GNU General Public License
 */

/*
 * This file is part of The Simple PHP MVC Framework (sipMVC).
 *
 * Copyright (C) 2012 Mikael Jacobson <mikael@mludd.se>
 *
 * sipMVC is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * sipMVC is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with sipMVC.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Controller for index page.
 *
 * @author Mikael Jacobson <mikael@mludd.se>
 * @copyright Copyright (c) 2012 Mikael Jacobson
 */
class Controllers_AboutController extends Controllers_Controller
{
    /**
     * Performs page rendering logic.
     */
    protected function indexAction()
    {
        $this->_template->assign('title', 'About');
        $this->_templateFile = 'about.tpl';
    }
}
