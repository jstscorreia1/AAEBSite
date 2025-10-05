$ano = 2025
$basePath = "img\$ano"

# Cria as pastas de 01/01 a 12/31 considerando os dias válidos de cada mês
for ($mes = 1; $mes -le 12; $mes++) {
    for ($dia = 1; $dia -le 31; $dia++) {
        try {
            # Tenta criar uma data válida
            $data = Get-Date -Year $ano -Month $mes -Day $dia -ErrorAction Stop

            # Formata mês e dia com dois dígitos
            $mesFormatado = "{0:D2}" -f $mes
            $diaFormatado = "{0:D2}" -f $dia

            # Caminho final da pasta
            $pasta = Join-Path -Path $basePath -ChildPath "$mesFormatado\$diaFormatado"
            
            # Cria a pasta se não existir
            if (-not (Test-Path -Path $pasta)) {
                New-Item -ItemType Directory -Path $pasta | Out-Null
                Write-Host "Criado: $pasta"
            }
        } catch {
            # Ignora datas inválidas, como 30/02
        }
    }
}

pause