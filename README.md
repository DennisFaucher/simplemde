# SimpleMDE Note Editor

This project is a mobile-friendly note editor built using the SimpleMDE editor and CoPilot. It allows users to create, edit, and manage notes with a clean and intuitive interface.

![SimpleMDE Readme](https://github.com/user-attachments/assets/0a2e18d7-d642-44b2-830f-ab205b60fbb4)

## Project Structure

```
$ tree .
.
├── docker-compose.yml
├── Dockerfile
├── files
│   ├── images
│   ├── Notes
│   └── Tasks
├── package.json
├── README.md
├── src
│   ├── app.js
│   ├── delete_note.php
│   ├── index.html
│   ├── list_notes.php
│   ├── list_tree.php
│   ├── load_note.php
│   ├── rename_note.php
│   ├── save_note.php
│   ├── search_notes.php
│   ├── styles.css
│   └── upload_image.php
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
