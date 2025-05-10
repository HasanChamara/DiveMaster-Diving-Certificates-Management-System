import { PlaceholderPattern } from '@/components/ui/placeholder-pattern';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem, type SharedData } from '@/types';
import { Head, Link, useForm, usePage } from '@inertiajs/react';
import { Certificate } from 'node:crypto';
import InputError from '@/components/input-error';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Textarea } from '@headlessui/react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Certificate Edit',
        href: '/certificates',
    },
];

export default function CertificateEdit() {
    const {certificate} = usePage().props
    const { data, setData, errors, put } = useForm({
        title: certificate.title || "",
        body: certificate.body || ""
    });

    const submit = (e: React.FormEvent<HTMLFormElement>) => {
        e.preventDefault();
        put(route('certificates.update', certificate.id));
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Edit Certificate" />
            <div className="flex w-full flex-1 flex-col gap-4 rounded-xl p-4">
                <div>
                    <Link 
                        href={route('certificates.index')}
                        className="px-3 py-2 text-xs font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800"
                    >
                        Back to Main
                    </Link>
                </div>

                <form onSubmit={submit} className="space-y-6">
                    <div className="grid gap-2">
                        <Label htmlFor="title">Certificate Title</Label>

                        <Input
                            id="title"
                            className="mt-1 block w-full"
                            value={data.title}
                            onChange={(e) => setData('title', e.target.value)}
                            required
                            autoComplete="title"
                            placeholder="Course 01 Completion Certificate"
                        />

                        <InputError className="mt-2" message={errors.title} />
                    </div>
                    <div className="grid gap-2">
                        <Label htmlFor="title">Certificate Detais</Label>

                        <Textarea
                            id="body"
                            className="border-input file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground flex h-40 w-full min-w-0 rounded-md border bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm"
                            value={data.body}
                            onChange={(e) => setData('body', e.target.value)}
                            autoComplete="body"
                            placeholder="Owner name, course details, ..."
                        ></Textarea>

                        <InputError className="mt-2" message={errors.body} />
                    </div>
                    <div>
                        <Button>Save</Button>
                    </div>
                </form>
            </div>
        </AppLayout>
    );
}
