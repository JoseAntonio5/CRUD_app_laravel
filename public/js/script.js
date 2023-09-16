const tel = document.getElementById('telefone');

tel.addEventListener('input', function () {
    // Removendo caracteres não numéricos
    const TelValue = tel.value.replace(/\D/g, '');

    if (TelValue.length >= 10) {
        // formata o telefone no formado (xx) xxxxx-xxxx
        const formattedValue = `(${TelValue.slice(0, 2)}) ${TelValue.slice(2, 7)}-${TelValue.slice(7, 11)}`;
        tel.value = formattedValue;
    }
});