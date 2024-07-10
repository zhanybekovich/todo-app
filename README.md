# Todo App API

This is a simple API for managing tasks in a todo application. The API allows users to create, read, update, and delete tasks, as well as search for tasks by status and deadline.

## Installation

1. Clone the repository:

    ```sh
    git clone https://github.com/zhanybekovich/todo-app.git
    cd todo-app
    ```

2. Install dependencies:

    ```sh
    composer install
    ```

3. Set up environment variables:

    ```sh
    cp .env.example .env
    php artisan key:generate
    ```

4. Set up the database:

    ```sh
    php artisan migrate --seed
    ```

5. Run the development server:
    ```sh
    php artisan serve
    ```

## API Documentation

### Authentication

#### Login

-   **URL:** `/api/login`
-   **Method:** `POST`
-   **Request Body:**
    ```json
    {
        "email": "user@example.com",
        "password": "password"
    }
    ```
-   **Response:**
    ```json
    {
        "token": "your-generated-token"
    }
    ```

### Tasks

#### Get All Tasks

-   **URL:** `/api/tasks`
-   **Method:** `GET`
-   **Headers:**
    ```plaintext
    Authorization: Bearer your-generated-token
    ```
-   **Query Parameters (optional):**
    -   `status`: Filter tasks by status (e.g., `todo`, `in_progress`, `done`)
    -   `deadline`: Filter tasks by deadline (format: `YYYY-MM-DD`)
    -   `page`: Pagination page number
-   **Response:**
    ```json
    {
        "data": [
            {
                "id": 1,
                "user_id": 1,
                "title": "Task title",
                "description": "Task description",
                "status": "in_progress",
                "deadline": "2024-07-31",
                "created_at": "2024-07-10T00:00:00.000000Z",
                "updated_at": "2024-07-10T00:00:00.000000Z"
            }
        ],
        "links": {
            "first": "http://your-app-url/api/tasks?page=1",
            "last": "http://your-app-url/api/tasks?page=2",
            "prev": null,
            "next": "http://your-app-url/api/tasks?page=2"
        },
        "meta": {
            "current_page": 1,
            "from": 1,
            "last_page": 2,
            "path": "http://your-app-url/api/tasks",
            "per_page": 10,
            "to": 10,
            "total": 20
        }
    }
    ```

#### Get Task by ID

-   **URL:** `/api/tasks/{id}`
-   **Method:** `GET`
-   **Headers:**
    ```plaintext
    Authorization: Bearer your-generated-token
    ```
-   **Response:**
    ```json
    {
        "id": 1,
        "user_id": 1,
        "title": "Task title",
        "description": "Task description",
        "status": "in_progress",
        "deadline": "2024-07-31",
        "created_at": "2024-07-10T00:00:00.000000Z",
        "updated_at": "2024-07-10T00:00:00.000000Z"
    }
    ```

#### Create a New Task

-   **URL:** `/api/tasks`
-   **Method:** `POST`
-   **Headers:**
    ```plaintext
    Authorization: Bearer your-generated-token
    ```
-   **Request Body:**
    ```json
    {
        "title": "New Task",
        "description": "Task description",
        "status": "todo",
        "deadline": "2024-07-31"
    }
    ```
-   **Response:**
    ```json
    {
        "data": {
            "id": 1,
            "user_id": 1,
            "title": "New Task",
            "description": "Task description",
            "status": "todo",
            "deadline": "2024-07-31",
            "created_at": "2024-07-10T00:00:00.000000Z",
            "updated_at": "2024-07-10T00:00:00.000000Z"
        }
    }
    ```

#### Update a Task

-   **URL:** `/api/tasks/{id}`
-   **Method:** `PUT`
-   **Headers:**
    ```plaintext
    Authorization: Bearer your-generated-token
    ```
-   **Request Body:**
    ```json
    {
        "title": "Updated Task",
        "description": "Updated description",
        "status": "in_progress",
        "deadline": "2024-08-01"
    }
    ```
-   **Response:**
    ```json
    {
        "data": {
            "id": 1,
            "user_id": 1,
            "title": "Updated Task",
            "description": "Updated description",
            "status": "in_progress",
            "deadline": "2024-08-01",
            "created_at": "2024-07-10T00:00:00.000000Z",
            "updated_at": "2024-07-10T00:00:00.000000Z"
        }
    }
    ```

#### Delete a Task

-   **URL:** `/api/tasks/{id}`
-   **Method:** `DELETE`
-   **Headers:**
    ```plaintext
    Authorization: Bearer your-generated-token
    ```
-   **Response:**
    ```json
    {
        "message": "Task deleted successfully"
    }
    ```

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
