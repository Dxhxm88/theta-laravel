# Theta Blog
Blog for you though

## Task 1: Setup and Basic Routing
- Inititalize a new Laravel project.

```
composer create-project laravel/laravel theta-blog
```

- Create routes for user registration, login, and logout.
For easier authentication, laravel has package to kickstart the login and register function
```
composer require laravel/ui
```

Then, install laravel UI package to scaffolding using Bootstrap 5

```
php artisan ui bootstrap --auth

npm install && npm run build
```
## Task 2: User Management
- Implement user registration with validation.

- Implement user login and logout functionality.

- Create user profile view and edit functionality (Basic form).

## Task 3: Blog Post
1.  Create a migration for blog posts.
```
php artisan make:model Post -m
```
To create model and migration.

2. Implement a CRUD system for creating, reading, updating, and deleting blog posts.
```
php artisan make:controller PostController -r
```

3. Implement pagination for blog post listing.
```
$posts = Post::paginate(10)

$posts->links()
```

## Task 4: Comments
1. Create a migration for comments.
```
php artisan make:model Comment -m
```

2. Implement the ability to comment on blog posts.
    - Add foreign_id for post in Comment migration

3. Display comments on the blog post detail page.
    - To display a comment just use
    ```
    $post->comments;
    ```

## Task 5: Relationships and Additional Features
1. Implement a relationship between users and the author's name.
    - Add relation for Post, User, and Comment
    
    ### Post
    - One post belong to a User
    - One post has many Comment

    ### Comment
    - One comment belong to a Post
    - One comment belong to a User

    ### User
    - One user has many Post
    - One user has many Comment


## Task 6: Integration with API
- Integrate with a Pokemon API

- Implement a controller to fetch data based on the user-provided parameter which is Pokemon name.
- Use `@if ` to check response before display message

## Task 8: Styling and UI
- For styling, we use Bootstrap 5 which come with laravel/ui package

## Task 9: Testing and Validation
- Test only cover for authentication functionality
```
php artisan test --testsuite=Unit
```
