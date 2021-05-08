function openUpload() {
    document.getElementById('upload-div').classList.add("visible");
    document.getElementById('upload-div').classList.remove("upload");
    document.getElementById('contents').classList.add("blur");
}

function hideupload() {
    document.getElementById('upload-div').classList.remove("visible");
    document.getElementById('upload-div').classList.add("upload");
    document.getElementById('contents').classList.remove("blur");
}

function upload_load() {
    document.getElementById('load').classList.remove("loading-upload-hide");
    document.getElementById('load').classList.add("loading-upload-show");
}