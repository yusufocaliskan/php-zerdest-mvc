![Zerdest is a small php-based mvc framework](/storage/images/zerdest-logo.png)


Php is a strong language, but not that organized! Zerdeşt [zerdesht] Mvc structure aims to solve that problem. However, Zerdeşt is now at the very beginning, we need your help as well. Please don't be shy when you have even a small idea or suggest putting the light on the problem of the structure. We are working on it, day by day, and try to make it more secure and strong. Do you want to take a look?

Here is the github repository.

``git clone https://github.com/yusufocaliskan/php-zerdest-mvc``

For the first installation:

``zerdest start [your-database-name]``

Zerdeşt would create a new database while installing itself by that command if there isn’t any database that exists with the same name that is given by the command. Besides, it would also create a new controller called login if there isn’t any.

To create a new fresh controller just use that command: 

``zerdest new-controller [a-new-controller-name]``

#You can add the routes by using Router class

``$router->get('/user/', users::class, 'home');``

``$router->post('/user/add/', users::class, 'create');``

``$router->get('/user/list/', users::class, 'list');``

``$router->put('/user/update/', users::class, 'update');``

``$router->delete('/user/delete/', users::class, 'delete');``

Now, you can go and create some magic with Zerdesht!

Enjoy!

