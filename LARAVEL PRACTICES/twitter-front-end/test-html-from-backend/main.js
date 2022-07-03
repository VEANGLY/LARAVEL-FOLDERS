let URL = 'http://127.0.0.1:3000/api/user_post_comments';
axios.get(URL).then(function (response) {
    var listUsers = response.data;
    console.log(listUsers);
    listUsers.forEach(function (user) {
        var posts = user.posts;
        posts.forEach(function (post) {
            let card = document.createElement('div');
            card.classList = 'card';

            let userName = document.createElement('p');
            userName.textContent = user.name;
            userName.id = user.id;
            userName.addEventListener("click",getClick)
            card.appendChild(userName);

            let postName = document.createElement('h4');
            postName.textContent = post.title;
            card.appendChild(postName);

            let description = document.createElement('p');
            description.textContent = post.description;
            card.appendChild(description);
            let hr = document.createElement('hr');

            let listComment = post.comments;
            card.appendChild(hr);
            listComment.forEach(function (comment){
                let commentor = document.createElement('p');
                let userId = comment.user_id;
                listUsers.forEach(function (user){
                    if(user.id == userId) {
                        commentor.textContent = user.name +" : " +comment.text;
                    }
                })
                card.appendChild(commentor)
            })
            container.appendChild(card);
        })
    })
    
})
let container = document.querySelector('.container');
function getClick(event){
    localStorage.setItem("user_id",JSON.stringify(event.target.id));
    // document.location.href = './profile';
}