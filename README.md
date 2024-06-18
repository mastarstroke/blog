## Project Overview 
In this simple blog system built with Laravel and Ajax, Here’s what you can expect:

### Key Features
- User Authentication: Ensures a secure environment through robust user authentication. Register an account and log in to access personalized features and interact more with the application.
- Create and Categorize Posts: Authenticated users can create posts effortlessly. Each post can be assigned to specific categories.
- Comments by Authenticated Users: Only authenticated users can comment.
- Admin and User Dashboards:     
- Admin Dashboard: Admins have full control over posts and comments. They can, edit, or delete any posts.    - User Dashboard: Users have a personal dashboard to manage their posts.
- Email Notifications: Users receive an email when someone comments on their posts.
- Homepage with Post Snippets: The homepage features snippets of the latest posts and posts according to their categories.
- Detailed Post Pages: Each post has its own detailed page, providing a full view of the content along with the comments section.
- Search Functionality: Users can search for posts by name, body or category.

## Set up.
- First step is to clone the repository, on the selected path on your local system.```git clone https://github.com/mastarstroke/blog.git```

- Once that's done, then you can run npm install, this installs the dependencies needed for the application to function
```npm install ```

- Run the command below to generate the application key
```php artisan key:gen```

- We are now almost there, so we need to update the .env file with our databse configuration
```DB_DATABASE=database name
    DB_USERNAME=database username
    DB_PASSWORD=database password (optional: only when your database username has a password)```
- We can now proceed to add the necessary tables by running migrations (We added a seeder for primary counsels), so we can start working with the app

```php artisan migrate --seed```

- We can now serve our application to have access to the UI of the app, we copy the link from the below command and paste on our browser, 

```php artisan serve``

`- For Testing  

```php artisan config:cache --env=testing```

```php artisan test --filter CommentTest ```
Thanks!
