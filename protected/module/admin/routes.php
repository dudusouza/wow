<?php
\wow\Router::addRouteAdmin('/', 'AdminController', 'index');
\wow\Router::addRouteAdmin('/minha-conta', 'AdminController', 'accountSave','post');
\wow\Router::addRouteAdmin('/minha-conta', 'AdminController', 'account','get');
\wow\Router::addRouteAdmin('/minha-conta/valid', 'AdminController', 'accountValidator');
\wow\Router::addRouteAdmin('/login', 'LoginController', 'enter','post');
\wow\Router::addRouteAdmin('/login', 'LoginController', 'index','get');
\wow\Router::addRouteAdmin('/logoff', 'LoginController', 'logoff');
\wow\Router::addRouteAdmin('/menu/{menu}', 'AdminController', 'lister');
\wow\Router::addRouteAdmin('/menu/{menu}/order/sorter', 'AdminController', 'sorter');
\wow\Router::addRouteAdmin('/menu/{menu}/{pg}', 'AdminController', 'lister');
\wow\Router::addRouteAdmin('/menu/form/{menu}/visual', 'AdminController', 'visual');
\wow\Router::addRouteAdmin('/menu/form/{menu}/insert', 'AdminController', 'insertAction', 'post');
\wow\Router::addRouteAdmin('/menu/form/{menu}/insert', 'AdminController', 'insert','get');
\wow\Router::addRouteAdmin('/menu/form/{menu}/update/{id}', 'AdminController', 'updateAction', 'post');
\wow\Router::addRouteAdmin('/menu/form/{menu}/update/{id}', 'AdminController', 'update','get');
\wow\Router::addRouteAdmin('/menu/form/{menu}/remove/{id}', 'AdminController', 'removeAction');
\wow\Router::addRouteAdmin('/visual/save', 'VisualController', 'save');
\wow\Router::addRouteAdmin('/visual/remove', 'VisualController', 'remove');