let page    = 1
let end     = false
let elem    = document.querySelector('.lasuitelasuitelasuite')

document.addEventListener('scroll', async () => {

    const current   = document.documentElement.scrollTop + document.documentElement.clientHeight
    const max       = document.documentElement.scrollHeight
    if (!end && current >= max)
    {
        page++
        await fetch(`like.php?npage=${page}`).then(function (response) {
            return response.text();
        }).then(function (html) {
            console.log(page);
            if (html !== 'empty')
                elem.innerHTML = elem.innerHTML + html
            else
                end = true
        }).catch(function (err) {
            console.warn('Something went wrong.', err);
        })
    }
})
