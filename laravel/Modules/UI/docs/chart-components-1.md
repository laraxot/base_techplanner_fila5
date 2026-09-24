# Componenti Chart

## Introduzione
I componenti chart forniscono visualizzazioni grafiche dei dati, utilizzando Chart.js come motore di rendering. Supportano vari tipi di grafici e sono altamente personalizzabili.

## Componenti Disponibili

### LineChart
```blade
<x-ui::line-chart
<<<<<<< .merge_file_swxWVA
=======
=======
<<<<<<< .merge_file_YqTr01
<x-ui::line-chart 
>>>>>>> laraxot/dev
=======
<<<<<<< HEAD
<x-ui::line-chart
=======
<x-ui::line-chart 
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> .merge_file_2VA6er
>>>>>>> .merge_file_SK9E8m
    :title="'Andamento Utenti'"
    :labels="['Gen', 'Feb', 'Mar', 'Apr', 'Mag', 'Giu']"
    :datasets="[
        [
            'label' => 'Nuovi Utenti',
            'data' => [65, 59, 80, 81, 56, 55],
            'borderColor' => '#4CAF50',
            'tension' => 0.1
        ]
    ]"
    :height="300"
    :responsive="true"
    :legend="true"
    :tooltips="true"
/>
```

### PieChart
```blade
<<<<<<< .merge_file_swxWVA
<x-ui::pie-chart
=======
<<<<<<< HEAD
<<<<<<< .merge_file_YqTr01
=======
<x-ui::pie-chart
=======
<<<<<<< HEAD
>>>>>>> .merge_file_2VA6er
<x-ui::pie-chart
=======
<x-ui::pie-chart 
>>>>>>> laraxot/dev
<<<<<<< .merge_file_YqTr01
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_2VA6er
>>>>>>> .merge_file_SK9E8m
    :title="'Distribuzione Utenti'"
    :labels="['Attivi', 'Inattivi', 'In attesa']"
    :data="[300, 50, 100]"
    :colors="['#4CAF50', '#F44336', '#FFC107']"
    :height="300"
    :responsive="true"
    :legend="true"
    :tooltips="true"
/>
```

### StatsOverview
```blade
<<<<<<< .merge_file_swxWVA
<x-ui::stats-overview
=======
<<<<<<< HEAD
<<<<<<< .merge_file_YqTr01
=======
<x-ui::stats-overview
=======
<<<<<<< HEAD
>>>>>>> .merge_file_2VA6er
<x-ui::stats-overview
=======
<x-ui::stats-overview 
>>>>>>> laraxot/dev
<<<<<<< .merge_file_YqTr01
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_2VA6er
>>>>>>> .merge_file_SK9E8m
    :stats="[
        [
            'label' => 'Utenti Totali',
            'value' => 1234,
            'icon' => 'users',
            'trend' => '+12%',
            'trendColor' => 'success'
        ],
        [
            'label' => 'Nuovi Oggi',
            'value' => 45,
            'icon' => 'user-plus',
            'trend' => '+5%',
            'trendColor' => 'success'
        ],
        [
            'label' => 'Conversioni',
            'value' => '78%',
            'icon' => 'chart-line',
            'trend' => '-2%',
            'trendColor' => 'danger'
        ]
    ]"
/>
```

## Personalizzazione

### Tema
- Colori personalizzati
- Stili CSS
- Animazioni
- Tooltip

### Dati
- Formati supportati
- Aggiornamento in tempo reale
- Filtri
- Trasformazioni

## Integrazione

### Livewire
```php
use Livewire\Component;

class UserStats extends Component
{
    public $chartData;

<<<<<<< .merge_file_swxWVA
=======
=======
<<<<<<< .merge_file_YqTr01
    
>>>>>>> laraxot/dev
=======
<<<<<<< HEAD

=======
    
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> .merge_file_2VA6er
>>>>>>> .merge_file_SK9E8m
    public function mount()
    {
        $this->updateChartData();
    }
<<<<<<< .merge_file_swxWVA

=======
<<<<<<< HEAD
<<<<<<< .merge_file_YqTr01
=======

=======
<<<<<<< HEAD
>>>>>>> .merge_file_2VA6er

=======
    
>>>>>>> laraxot/dev
<<<<<<< .merge_file_YqTr01
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_2VA6er
>>>>>>> .merge_file_SK9E8m
    public function updateChartData()
    {
        $this->chartData = [
            'labels' => ['Gen', 'Feb', 'Mar'],
            'datasets' => [
                [
                    'label' => 'Utenti',
                    'data' => User::countByMonth(),
                    'borderColor' => '#4CAF50'
                ]
            ]
        ];
    }
<<<<<<< .merge_file_swxWVA

=======
<<<<<<< HEAD
<<<<<<< .merge_file_YqTr01
=======

=======
<<<<<<< HEAD
>>>>>>> .merge_file_2VA6er

=======
    
>>>>>>> laraxot/dev
<<<<<<< .merge_file_YqTr01
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_2VA6er
>>>>>>> .merge_file_SK9E8m
    public function render()
    {
        return view('livewire.user-stats');
    }
}
```

## Best Practices

### Utilizzo
- Dati significativi
- Leggibilità
- Responsive design
- Accessibilità

### Performance
- Ottimizzazione dati
- Lazy loading
- Cache risultati
- Aggiornamento efficiente

## Collegamenti
- [Componenti Base](./base-components.md)
- [Componenti Form](./form-components.md)
- [Componenti Table](./table-components.md)
- [Componenti Layout](./layout-components.md)
- [Documentazione Frontend](../Cms/docs/frontend-architecture.md)
