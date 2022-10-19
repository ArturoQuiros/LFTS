# Filter

Modificamos el modelod e **Post** debido a un error al filtrar

```
 $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(fn($query) =>
                $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('excerpt', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%')
            );
        });
```
