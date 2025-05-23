# SimpleMDE Note Editor

This project is a mobile-friendly note editor built using the SimpleMDE editor. It allows users to create, edit, and manage notes with a clean and intuitive interface.

## Project Structure

```
simplemde
├── src
│   ├── index.html        # Main HTML document for the note editor
│   ├── app.js           # JavaScript code for initializing SimpleMDE
│   ├── styles.css       # CSS styles for a mobile-friendly design
│   └── upload_image.php  # PHP script for handling image uploads
├── Dockerfile            # Instructions to build the Docker image
├── docker-compose.yml    # Configuration for Docker services
├── package.json          # npm configuration file with dependencies
└── README.md             # Project documentation
```

## Setup Instructions

1. **Clone the Repository**
   Clone this repository to your local machine using:
   ```
   git clone <repository-url>
   ```

2. **Navigate to the Project Directory**
   ```
   cd simplemde
   ```

3. **Build the Docker Image**
   Run the following command to build the Docker image:
   ```
   docker build -t simplemde .
   ```

4. **Run the Application**
   Use Docker Compose to start the application:
   ```
   docker-compose up
   ```

5. **Access the Note Editor**
   Open your web browser and navigate to `http://localhost:your-port` to access the note editor.

## Usage Guidelines

- Use the editor to create and format your notes.
- You can paste images directly into the editor, which will be handled by the `upload_image.php` script.
- Customize the styles in `styles.css` to fit your preferences.

## Contributing

Contributions are welcome! Please feel free to submit a pull request or open an issue for any enhancements or bug fixes.

## License

This project is licensed under the MIT License. See the LICENSE file for more details.