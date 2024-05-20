var count = 0;
document.getElementById("myButton").onclick = function () {
    count++;
    if (count % 2 == 0) {
        document.getElementById("demo").innerHTML = "";
    }
    else {
        var img = document.createElement("img");
        img.src = "https://www.meme-arsenal.com/memes/bb42e8cfb950a4017cfa57700c0a6065.jpg";
        document.getElementById("demo").appendChild(img);
    }
}