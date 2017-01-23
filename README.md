# Goliath thumbnail control size

WordPress plugin that control the thumbnail minume size

## How to add a minimum size

Just add the `thumbnail_size` in your post type registration arguments.

### Examples : 

For a build in post type

```php
add_filter( 'register_post_type_args', 'goliath_register_post_type_args', 10, 2 );

function goliath_register_post_type_args( $args, $post_type_name ){

    if( $post_type_name == 'post' ){

        $args['thumbnail_size'] = array(
            'min'       => array( '500', '311' ),
            'cropped'    => true
        );
    }

    return $args;
}
