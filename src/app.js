// This file initializes the EasyMDE editor and handles note editing functionality.

document.addEventListener("DOMContentLoaded", function() {
    var easyMDE = new EasyMDE({
        element: document.getElementById("editor"),
        autoDownloadFontAwesome: true,
        toolbar: [
            "bold", "italic", "heading", "|",
            "quote", "unordered-list", "ordered-list", "|",
            "link", "image", "|",
            "preview"
        ],
        autofocus: true,
        autosave: {
            enabled: true,
            uniqueId: "DennisFaucher",
            delay: 1000,
        },
        imageUploadFunction: function(file, onSuccess, onError) {
            var formData = new FormData();
            formData.append("pasted_image", file);

            fetch("upload_image.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    onSuccess(data.url);
                } else {
                    onError(data.error);
                }
            })
            .catch(error => {
                onError("Upload failed");
            });
        }
    });

    // --- File Management ---
    // Add buttons
    const container = document.querySelector('.container');
    const btnBar = document.createElement('div');
    btnBar.style.marginBottom = "10px";
    btnBar.innerHTML = `
        <button id="new-note">New</button>
        <button id="open-note">Open</button>
        <button id="save-note">Save As</button>
    `;
    container.insertBefore(btnBar, container.querySelector('textarea'));

    // Modal for open
    const modal = document.createElement('div');
    modal.id = "open-modal";
    modal.style.display = "none";
    modal.style.position = "fixed";
    modal.style.left = "0"; modal.style.top = "0";
    modal.style.width = "100vw"; modal.style.height = "100vh";
    modal.style.background = "rgba(0,0,0,0.5)";
    modal.style.justifyContent = "center";
    modal.style.alignItems = "center";
    modal.innerHTML = `
        <div style="background:#fff;padding:20px;max-width:90vw;">
            <h3>Open Note</h3>
            <ul id="note-list"></ul>
            <button id="close-modal">Close</button>
        </div>
    `;
    document.body.appendChild(modal);

    // Save note
    document.getElementById('save-note').onclick = function() {
        const name = prompt("Save as (note name):");
        if (!name) return;
        fetch('save_note.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                name: name,
                content: easyMDE.value()
            })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                alert("Saved to server as '" + name + ".md'");
            } else {
                alert("Error: " + data.error);
            }
        })
        .catch(() => alert("Network error"));
    };

    // New note
    document.getElementById('new-note').onclick = function() {
        if (easyMDE.value().trim() && !confirm("Discard current note?")) return;
        easyMDE.value("");
    };

    // Open note
    document.getElementById('open-note').onclick = function() {
        const noteList = document.getElementById('note-list');
        noteList.innerHTML = "";
        fetch('list_notes.php')
            .then(res => res.json())
            .then(data => {
                if (data.notes && data.notes.length) {
                    data.notes.forEach(name => {
                        const li = document.createElement('li');
                        li.style.cursor = "pointer";
                        li.textContent = name;
                        li.onclick = function() {
                            fetch('load_note.php?name=' + encodeURIComponent(name))
                                .then(res => res.json())
                                .then(noteData => {
                                    if (noteData.success) {
                                        easyMDE.value(noteData.content);
                                        modal.style.display = "none";
                                    } else {
                                        alert("Error: " + noteData.error);
                                    }
                            });
                        };
                        noteList.appendChild(li);
                    });
                } else {
                    noteList.innerHTML = "<li>No notes found.</li>";
                }
                modal.style.display = "flex";
            });
    };
    document.getElementById('close-modal').onclick = function() {
        modal.style.display = "none";
    };
});