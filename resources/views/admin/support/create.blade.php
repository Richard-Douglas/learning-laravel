<h1>Novo Suporte</h1>

<form action="{{ route('supports.store')}}" method="POST">
    @csrf()
    <input type="text" placeholder="Assunto" name="suject">
    <textarea name="body" cols="30" rows="10" placeholder="Descrição"></textarea>
    <button type="submit">Enviar</button>
</form>