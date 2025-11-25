export default function FormattedCPF({ cpf }) {
    const formatCPF = (value) => {
        if (!value || value === 'Não informado') return value;
        const cleaned = value.replace(/\D/g, '');
        return cleaned.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
    };

    return (
        <p className="text-sm text-gray-900 dark:text-white font-medium">
            {formatCPF(cpf)}
        </p>
    );
}
