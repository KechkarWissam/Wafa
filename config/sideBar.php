<?php

return [
        'items' => [
            [
                'name' => 'Tableau de bord' ,
                'icon' => 'nav-icon fas fa-tachometer-alt' ,
                'permission' => '',
                'link' => 'home',
            ],
            [
                'name' => 'Utilisateurs' ,
                'icon' => 'nav-icon fas fa-users' ,
                'permission' => '',
                'link' => '',
                'children' => [
                    [
                        'name' => 'Gestion des utilisateurs' ,
                        'icon' => 'far fa-circle nav-icon' ,
                        'permission' => '',
                        'link' => '',
                    ],
                    [
                        'name' => 'Gestion des roles' ,
                        'icon' => 'far fa-circle nav-icon' ,
                        'permission' => '',
                        'link' => '',
                    ],
                    [
                        'name' => 'Gestion des permissions' ,
                        'icon' => 'far fa-circle nav-icon' ,
                        'permission' => '',
                        'link' => '',
                    ],
                ] 
            ],
            [
                'name' => 'Produits' ,
                'icon' => 'nav-icon fas fa-plus-square' ,
                'permission' => '',
                'link' => '',
                'children' => [
                    [
                        'name' => 'Gestion des produits' ,
                        'icon' => 'far fa-circle nav-icon' ,
                        'permission' => '',
                        'link' => 'products.index',
                    ],
                    [
                        'name' => 'Gestion des catégories' ,
                        'icon' => 'far fa-circle nav-icon' ,
                        'permission' => '',
                        'link' => '',
                    ],
                ] 
            ],
            [
                'name' => 'Commentaires' ,
                'icon' => 'nav-icon fas fa-comment' ,
                'permission' => '',
                'link' => '',
            ],
            [
                'name' => 'Email' ,
                'icon' => 'nav-icon fas fa-envelope' ,
                'permission' => '',
                'link' => '',
            ],
            [
                'name' => 'Paramètres' ,
                'icon' => 'nav-icon fas  fa-cog' ,
                'permission' => '',
                'link' => '',
                'children' => [
                    [
                        'name' => 'Paramètres généraux' ,
                        'icon' => 'far fa-circle nav-icon' ,
                        'permission' => '',
                        'link' => '',
                    ],
                    [
                        'name' => 'Contenu des pages' ,
                        'icon' => 'far fa-circle nav-icon' ,
                        'permission' => '',
                        'link' => '',
                    ],
                    [
                        'name' => "Page d'accueil" ,
                        'icon' => 'far fa-circle nav-icon' ,
                        'permission' => '',
                        'link' => '',
                    ],
                ] 
            ],
        ]
];