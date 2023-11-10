<template>
    <div class="header">
        <div class="info">
            
            <h1>Front Aplication</h1>
        </div>
        <div class="nav">
            <nav class="navbar">
                <li>Home</li>
                <li>Contato</li>
            </nav>
        </div>
    </div>
</template>

<script>
export default {

}

</script>

<style scoped>
.header {
    width: 100%;
    height: 90px;
    display: flex;
    align-items: center;
    flex-direction: row;
    justify-content: flex-start;
    background-color: black;
    color: white;
    padding: 20px;
}
.info {
    width: 50%;
    display: flex;
    align-items: center;
    justify-content: space-around;
    margin: 10px;
    padding: 10px;
}

.info h1 {
    display: flex;
    margin: 10px;
    padding: 10px;
}

.nav{
    width: 50%;
    display: flex;
    align-items: center;
    justify-content: space-around;
}
.navbar {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    list-style: none;
    margin: 10px;
    padding: 10px;
}

.navbar li {
    align-items: center;
    justify-content: flex-end;
    list-style: none;
    margin: 10px;
    padding: 10px;
}


</style>