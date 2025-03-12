@props(['text'])
<script>
    function showAlert(){
        alert(<h1>are you sure you want to delete all the messages?</h1>, <h2>if you press ok the messages will be deleted perminantly!</h2>)
    }
    <button>{{$text}}</button>
</script>