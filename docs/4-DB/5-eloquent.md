# BD

Usamos tinker `php artisan tinker`

Y modificamos el _body_ de los _posts_

```
sudo php artisan tinker
$post = App\models\Post::first();
$post->body;
$post->body = '<p>' . $post->body . '</p>';
$post->save();

$post = App\models\Post::find(2);
$post->body = '<p>' . $post->body . '</p>';
$post->save();
exit

```
