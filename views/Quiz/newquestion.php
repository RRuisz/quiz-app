<?php include './templates/header.php'; ?>


<form method="POST">
    <select id="category_select">

    </select>

    <select id="quiz_select">

    </select>
</form>












<script>

    const categorySelect = document.querySelector('#category_select')
    const questionSelect = document.querySelector('#quiz_select')
    // TODO: ON CHANGE OF CATEGORY SELECT, GET THE QUIZES OF THE SELECTED CATEGORY FOR THE 2nd SELECT ELEMENT
    const url = 'http://localhost/quizapp/api/categories'
    fetch(url)
        .then(response => response.json())
        .then(data => {
            data.forEach( item => {
                console.log(item);
                const option = document.createElement('option')
                option.value = item.id
                option.textContent = item.name
                categorySelect.appendChild(option);
            })
    })
</script>