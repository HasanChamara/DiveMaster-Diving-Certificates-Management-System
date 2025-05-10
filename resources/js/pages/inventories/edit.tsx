import { PlaceholderPattern } from '@/components/ui/placeholder-pattern';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem, type SharedData } from '@/types';
import { Head, Link, useForm, usePage } from '@inertiajs/react';
import InputError from '@/components/input-error';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Textarea } from '@headlessui/react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Item Edit',
        href: '/inventories',
    },
];

export default function InventoryEdit() {
    const {inventory} = usePage().props
    const { data, setData, errors, put } = useForm({
        title: inventory.title||"",
        sku: inventory.sku||"",
        brand: inventory.brand||"",
        status: inventory.status||"",
        description: inventory.description||""
    });

    const submit = (e: React.FormEvent<HTMLFormElement>) => {
        e.preventDefault();
        put(route('inventories.update', inventory.id));
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Edit Item" />
            <div className="flex w-full flex-1 flex-col gap-4 rounded-xl p-4">
                <div>
                    <Link 
                        href={route('inventories.index')}
                        className="px-3 py-2 text-xs font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800"
                    >
                        Back to Main
                    </Link>
                </div>

                <form onSubmit={submit} className="space-y-6">
                     <div className="grid gap-2">
                        <Label htmlFor="title">Item Title</Label>

                        <Input
                            id="title"
                            className="mt-1 block w-full"
                            value={data.title}
                            onChange={(e) => setData('title', e.target.value)}
                            required
                            autoComplete="title"
                            placeholder="item 01"
                        />

                        <InputError className="mt-2" message={errors.title} />
                    </div>
                    <div className="grid gap-2">
                        <Label htmlFor="title">Item SKU</Label>

                        <Textarea
                            id="sku"
                            className="border-input file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground flex h-9 w-full min-w-0 rounded-md border bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm"
                            value={data.sku}
                            onChange={(e) => setData('sku', e.target.value)}
                            autoComplete="sku"
                            placeholder="SKU0001"
                        ></Textarea>

                        <InputError className="mt-2" message={errors.sku} />
                    </div>
                    <div className="grid gap-2">
                        <Label htmlFor="title">Item Brand</Label>

                        <Textarea
                            id="brand"
                            className="border-input file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground flex h-9 w-full min-w-0 rounded-md border bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm"
                            value={data.brand}
                            onChange={(e) => setData('brand', e.target.value)}
                            autoComplete="brand"
                            placeholder="Samsung"
                        ></Textarea>

                        <InputError className="mt-2" message={errors.brand} />
                    </div>
                    <div className="grid gap-2">
                        <Label htmlFor="title">Item status</Label>

                        <Textarea
                            id="status"
                            className="border-input file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground flex h-9 w-full min-w-0 rounded-md border bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm"
                            value={data.status}
                            onChange={(e) => setData('status', e.target.value)}
                            autoComplete="status"
                            placeholder="Available"
                        ></Textarea>

                        <InputError className="mt-2" message={errors.status} />
                    </div>
                    <div className="grid gap-2">
                        <Label htmlFor="title">Item Description</Label>

                        <Textarea
                            id="description"
                            className="border-input file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground flex h-40 w-full min-w-0 rounded-md border bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm"
                            value={data.description}
                            onChange={(e) => setData('description', e.target.value)}
                            autoComplete="description"
                            placeholder="Item description ...."
                        ></Textarea>

                        <InputError className="mt-2" message={errors.description} />
                    </div>
                    <div>
                        
                        <Button>Save</Button>
                    </div>
                </form>
            </div>
        </AppLayout>
    );
}
