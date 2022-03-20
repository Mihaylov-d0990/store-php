async function cartAddItem(id) {
    let object = {
        name: "Danila",
        surname: "Mihaylove"
    }
    
    await fetch("db/addUserType.php", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(object)
    })
    .then(response => response.json())
    .then (data => {
        console.log(data);
    })
    .catch((error) => {
        console.error('Error:', error);
      });
    
}