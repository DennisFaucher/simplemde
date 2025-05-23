##### JS Editors
- https://js.libhunt.com/monaco-editor-alternatives
- ckeditor
	- spell check?
- Monaco
- ACE (Ajax Cloud Editor)
- codemirror
- Quill (WYSIWYG)
- Vuetify
- Slate (Beta)
- Editor.js
- Trix
- Toast (Markdown WYSIWYG)
- medium-editor (WYSIWYG)
- TinyMCE
- Summernote (WYSIWYG)
- SimpleMDE( Mardown + save + spellcheck) https://simplemde.com/ Very nice, Includes a preview icon
	- This is working great running at notes.faucher.live
	- Caveats
		- Browser search needs to be in Preview mode to search the note past the current screen
		- Spell check highlights word but does not offer replacement word
	- Nice. Highlights misspelled words. Does not offer correct spelling nor fix them.
	- Options are saved at 
```
var simplemde = new SimpleMDE({
	autosave: {
		enabled: true,
		uniqueId: "MyUniqueID",
		delay: 1000,
	},
```
- ProseMirror
- bootstrap (WYSIWYG)
- Pen (Markdown)
- 

##### Issues with LinuxNotes Python
```
- Does not like ** (Might be fixed)
- Does not line <ul> nor </ul> (Did not fix)
- Use Tab to indent bullets- bullets = ['•', '◦', '▪', '-']
- Does note like nested bulleted list that are tabbed
- I did not add code for numbered lists
- Markdown syntax for images: ![[image_name.png]]
- PDF output displays images. Must be full path.
- Cannot preview images without webkit
	- webkitgtk: Linux is required for this software.
- Having issues with relative path for images
	- <img src="images/Lucie.jpg" width="50%" height="50%">
	- Fixed. moved images dir inside notes dir
	- These both work
	- <img src="images/Lucie.jpg" width="50%" height="50%">
	- ![Lucie](images/Lucie.jpg)

- IMAGE WIDTH
- ##### Pure Markdown (These width tags work in preview but not WeazyPrint PDF)

- Original Size (Eaisest and typical)
- ![Lucie512](images/Lucie512.jpg)

- width="128px"
- ![Lucie512 25% Width](images/Lucie512.jpg){: width="128px" }

- width="25%" height="25%"
- ![Lucie512 25% Width](images/Lucie512.jpg){: width="25%" height="25%" }

- width="128px" height="128px"
- ![Lucie512 25% Width](images/Lucie512.jpg){: width="128px" height="128px" }


- ##### 2025-05-16 20:00 Gemini Notation
- ![Lucie512 128px Width](images/Lucie512.jpg){: style="width: 128px !important;" }

```

##### Gemini IDE Integration
- VSCodium: Creates files, but cannot update files
- VSCode: Creates files, edits files
	- Not always: The code change produced by Gemini could not be fully parsed. Can't automatically accept changes.
##### CoPilot IDE Integration
- VSCode: Created Rust clock. Forgot to create index.html. Lots of errors when running.
##### Experiments
- Native Linux Notes App
	- Gemini
		- In the folder /home/dennis/Nextcloud/MBP-Personal/Programming/VibeCoding/Gemini/LinuxNotes, create a native lunux app for notes. Implement the ability to create, edit, delete, view, print notes. Notes will be edited in markdown. 
		- 
- Portable Notes App
	- Gemini
		- Rust: Disaster. Could not add more than one line of text
		- JavaScript:
			- In the folder /Users/faucherd/Documents/Personal/MBP-Personal/Programming/VibeCoding/Gemini/JSNotes, create a portable JavaScript app that can be used to create, edit, delete, view notes. The notes will be written in Markdown. Add a feature to view the notes in formatted Markdown.
			- Stores in browser local storage: /Users/faucherd/Library/Application Support/Google/Chrome/Default. Not sure
		- React
			- In the folder /Users/faucherd/Documents/Personal/MBP-Personal/Programming/VibeCoding/Gemini/ReactNotes, create a portable React app that can be used to create, edit, delete, view notes. The notes will be written in Markdown. Add a feature to view the notes in formatted Markdown.
			- Local Storage: Chrome > Tools > More Tools > Developer Tools > Application > Local Storage
			- [faucherd@wwt-mbp in ~/Library/Application Support/Google/Chrome/Default/Local Storage]
			- $ grep -iRl "JabberWocky" .
			- ./leveldb/014138.log

```
1. [{id: 1747246565784, title: "Easy to Find", content: "JabberWocky", createdAt: 1747246565784,…},…]

2. 0: {id: 1747246565784, title: "Easy to Find", content: "JabberWocky", createdAt: 1747246565784,…}
3. 1: {id: 1747246509910, title: "First Note", content: "Where is local storage?", createdAt: 1747246509910,…}
```


- Rust Code
	- Gemini & VSCode
		- RustClock had lots of errors in web app
		- "Write a simple Rust program"
			- Worked
```
$ cargo run
   Compiling simple_rust_app v0.1.0 (/Users/faucherd/Documents/Personal/MBP-Personal/Programming/VibeCoding/Gemini/SimpleRust)
    Finished `dev` profile [unoptimized + debuginfo] target(s) in 0.99s
     Running `target/debug/simple_rust_app`
Hello, Rust world!
```
- .
	- CoPilot & VSCode
		-  "Write a simple Rust program"
		- Error creating new file. Odd "**Failed to create file: Unable to write file '/faucherd/Documents/Personal/MBP-Personal/Programming/VibeCoding/CoPilot/SimpleGo/main.go' (Unknown (FileSystemError): Error: EROFS: read-only file system, mkdir '/faucherd')**"
		- Did not create a Cargo.tom. which is OK. I had to ask it explicitly how to run the program. Needed to:
		- rustc main.rs
		- ./main
	- Glean RustClock - Could not debug cargo clean errors
		- Don't use homebrew rustc and rustup. Install native
		- "Create an analog clock web app in Rust. Use Material Design."
		- cargo install wasm-pack
		- set -gx PATH $PATH /Users/faucherd/.cargo/bin
		- cargo new analog_clock --lib
		- cd analog_clock
		- (Edit files)
		- wasm-pack build --target web
- Go Code
	- Gemini & VSCode: In the folder /Users/faucherd/Documents/Personal/MBP-Personal/Programming/VibeCoding/Gemini/GoClock, create an analog clock web app in Go. Use Material Design.
		- Working
	- CoPilot & VSCode
		- "Write a simple Go program"
		- Could not create file. Used the wrong filename extension - .rs not .go
		- I had to ask how to run the program - "go run main.go"
		- 
- Any Code
	- Glean: Create an analog clock web app. Use Material Design.
		- Only the second hand displayed. No Clock.
		- Awful
- Write a LAMP app for keeping notes. Include the ability to create, edit, and delete notes. Include the ability to organize notes into folders and subfolders. Include the ability to format with markdown. Include the ability to search.
- Windsurf
	- System76
		- Write a web app for keeping notes. Include the ability to create, edit, and delete notes. Include the ability to organize notes into folders and subfolders. Include the ability to format with markdown. Include the ability to search.
			- OMG. Such a complicated React Node app with so many errors.
			- Horrible experience
- Gemini
	- System76
		- Write a web app for keeping notes. Include the ability to create, edit, and delete notes. Include the ability to organize notes into folders and subfolders. Include the ability to format with markdown. Include the ability to search.
			- Would not create all the code for me
		- Write a python web-based app for keeping notes. Include the ability to create, edit, and delete notes. Include the ability to organize notes into folders and subfolders. Include the ability to format with markdown. Include the ability to search.
			- Works, but ugly
			- Might be able to ask it for a better style like Material Design
	- Mac VSCodium Plugin
		- Create a web app in this folder that 
			* Uses Material Design 
			* Displays the current weather 
			* Displays the daily weather forecast 
			* Displays the 5 day forecast 
			* Have the user enter a city name to search for
	* TideWatch
		1. In the folder /Users/faucherd/Documents/Personal/MBP-Personal/Programming/VibeCoding/Gemini/TideWatch, create a new web app that displays an analog clock. Use Material Design. Do not include a second hand. Add a third hand, that is the color red, which rotates once every 73 minutes. Include a + and - button to adjust this red hand's position.
		2. add tick marks for hours
		3. change the favicon to a sea wave
		4. show the next high tide and low tide for Rockport, Massachusetts. Show these tides below the increment and decrement buttons.
		5. Change the red hand math so that the red hand points to where the hour hand would point for the next low tide. Remove the Increment and Decrement buttons
		6. Add a green hand that points to where the hour hand would point for the next high tide.
- Weird Accuweather Behavior
	- https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=${unit}
	* https://api.openweathermap.org/data/2.5/weather?q=Camden&appid=09771f49a39888c177621547f675ac07&units=Imperial