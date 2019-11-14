<?php

namespace SanSessionToolbar;

use Zend\ServiceManager\Factory\InvokableFactory;

/**
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

return [

    'controllers' => [
        'factories' => [
            Controller\SessionToolbarController::class => Factory\Controller\SessionToolbarControllerFactory::class,
        ],
    ],

    'router' => [
        'routes' => [
            'san-session-toolbar' => [
                'type'    => 'segment',
                'options' => [
                    'route'    => '/san-session-toolbar[/:action]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ],
                    'defaults' => [
                        'controller' => Controller\SessionToolbarController::class,
                        'action'     => 'removesession',
                    ],
                ],
            ],
        ],
    ],

    'service_manager' => [
        'factories' => [
            Manager\SessionManager::class => InvokableFactory::class,
            'session.toolbar' => Factory\Collector\SessionCollectorFactory::class,
        ],
    ],

    'view_manager' => [
        'template_map' => [
            'zend-developer-tools/toolbar/session-data' => __DIR__.'/../view/zend-developer-tools/toolbar/session-data.phtml',
            'zend-developer-tools/toolbar/session-data-list' => __DIR__.'/../view/zend-developer-tools/toolbar/session-data-list.phtml',
        ],
        'strategies' => [
            'ViewJsonStrategy',
        ],
    ],

    'zenddevelopertools' => [
        'profiler' => [
            'collectors' => [
                'session.toolbar' => 'session.toolbar',
            ],
        ],
        'toolbar' => [
            'entries' => [
                'session.toolbar' => 'zend-developer-tools/toolbar/session-data',
            ],
        ],
    ],

    'laminas-developer-tools' => [
        'profiler' => [
            'collectors' => [
                'session.toolbar' => 'session.toolbar',
            ],
        ],
        'toolbar' => [
            'entries' => [
                'session.toolbar' => 'zend-developer-tools/toolbar/session-data',
            ],
        ],
    ],

];
