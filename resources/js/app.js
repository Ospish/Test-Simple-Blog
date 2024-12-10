import './bootstrap';

export default class core {
    static init() {
        const articleElem = document.querySelector('#article')
        const commentForm = document.querySelector('#comment_form')
        const commentTitle = document.querySelector('#comment_title')
        const commentBody = document.querySelector('#comment_body')

        console.log('app.js init')
        if (articleElem)
        // Init article view functionality (refreshing value after request)
        setTimeout(function () {
            core.view().then(response => {
                document.querySelector('.article__views_value').innerHTML = response["views"];
            })
        }, 5000)

        // Init comment form (attaching submit event and showing form validation results after request)
        if (commentForm) {
            commentForm.addEventListener('submit', function (e) {
                e.preventDefault()
                // Check the request results on success and show success message or error borders
                core.comment().then(response => {
                    const form = document.querySelector('#comment_form')
                    console.log(response)
                    if (typeof response !== "undefined") {
                        const successMsg = document.createElement('div')
                        successMsg.classList.add('border', 'border-green-500' , 'min-h-16', 'flex', 'items-center', 'justify-center', 'text-green-500', 'mt-2')
                        successMsg.innerHTML = 'Ваше сообщение успешно отправлено!'
                        form.parentNode.insertBefore(successMsg, form)
                        form.remove()
                    } else {
                        if (commentTitle.value === "")
                            commentTitle.classList.add('border', 'border-red-500')
                        if (commentBody.value === "")
                            commentBody.classList.add('border', 'border-red-500')
                    }
                })
            })

            // Refresh inputs error borders after change
            commentTitle.addEventListener('change', function () {
                commentTitle.classList.remove('border', 'border-red-500')
            })
            commentBody.addEventListener('input', function () {
                commentTitle.classList.remove('border', 'border-red-500')
            })
        }
        // Init like buttons (attaching click event and refreshing value after request)
        document.querySelectorAll('.article__likes').forEach(function (elem) {
            elem.addEventListener('click', function () {

                core.like(elem).then(response => {
                    elem.querySelector('.article__likes_value').innerHTML = response["likes"];
                })
            })
        })
        document.querySelectorAll('.taglink').forEach(function (elem) {
            elem.addEventListener('click', function (e) {
                e.preventDefault()
            })
        })
    }

    // Article view function (sends the AJAX request)
    static async view() {
        const url = "/articles/"+ document.querySelector('#article').dataset.id + "/view";
        try {
            const response = await fetch(url, {
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
            });
            if (!response.ok) {
                console.error(response.body);
            }

            return await response.json()
        } catch (error) {
            throw new Error(error);
        }
    }

    // Article like function (sends the AJAX request)
    static async like(elem) {
        const url = "/articles/"+ elem.closest('.article').dataset.id + "/like";
        try {
            const response = await fetch(url, {
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({
                })
            });
            if (!response.ok) {
                console.error(response.body);
            }

            return await response.json()
        } catch (error) {
            throw new Error(error);
        }
    }

    // Article comment function (sends the AJAX request)
    static async comment() {
        const url = "/articles/"+ document.querySelector('#article').dataset.id + "/comment";
        try {
            const response = await fetch(url, {
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({
                    'title': document.querySelector('#comment_title').value,
                    'body': document.querySelector('#comment_body').value
                }),
                redirect: 'error'
            });
            if (!response.ok) {
                console.error(response.body);
            }

            return await response.json();
        } catch (error) {
            console.error(error);
        }
    }
}

core.init()
