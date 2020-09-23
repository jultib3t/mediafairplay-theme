console.log('js file is connected');
if (document.readyState !== 'loading') {
        console.log("ready!");
        ready();
    } else {
        document.addEventListener('DOMContentLoaded', ready);
    }

    function ready() {
        var accordion = document.getElementsByTagName("dt");

        for (var i = 0; i < accordion.length; i++) {
            accordion[i].addEventListener('click', function() {
                accordionClick(event);

            });
        }
    }

    var accordionClick = (eventHappened) => {
        console.log(eventHappened);
        var targetClicked = event.target;
        console.log(targetClicked);
        var classClicked = targetClicked.classList;
        console.log("target clicked: " + targetClicked);
        console.log(classClicked[0]);
        while ((classClicked[0] != "description-title")) {
            console.log("parent element: " + targetClicked.parentElement);
            targetClicked = targetClicked.parentElement;
            classClicked = targetClicked.classList;
            console.log("target clicked while in loop:" + targetClicked);
            console.log("class clicked while in loop: " + classClicked);
        }
        var description = targetClicked.nextElementSibling;
        console.log(description);
        var expander = targetClicked.children[0];
        if (description.style.maxHeight) {
            description.style.maxHeight = null;
            expander.innerHTML = '<svg width="24px" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"></path></svg>'

        } else {
            var allDescriptions = document.getElementsByTagName("dd");
            for (var i = 0; i < allDescriptions.length; i++) {
                console.log("current description: " + allDescriptions[i]);
                if (allDescriptions[i].style.maxHeight) {
                    console.log("there is a description already open");
                    allDescriptions[i].style.maxHeight = null;
                    allDescriptions[i].previousElementSibling.children[0].innerHTML = '<svg width="24px" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"></path></svg>'
                }
            }
            description.style.maxHeight = description.scrollHeight + "px";

            expander.innerHTML = '<svg width="24px" focusable="false" style="transform:rotate(180deg)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"></path></svg>';

        }
    }