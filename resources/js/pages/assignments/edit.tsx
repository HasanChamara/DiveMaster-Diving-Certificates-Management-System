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
        title: 'Assignment Edit',
        href: '/assignments',
    },
];

export default function AssignmentEdit() {
    const {assignment} = usePage().props
    const { data, setData, errors, put } = useForm({
        title: assignment.title || "",
        level: assignment.level || "",
        question: assignment.question || "",
        mark: assignment.mark || ""
    });

    const submit = (e: React.FormEvent<HTMLFormElement>) => {
        e.preventDefault();
        put(route('assignments.update', assignment.id));
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Edit Assignment" />
            <div className="flex w-full flex-1 flex-col gap-4 rounded-xl p-4">
                <div>
                    <Link 
                        href={route('assignments.index')}
                        className="px-3 py-2 text-xs font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800"
                    >
                        Back to Main
                    </Link>
                </div>

                <form onSubmit={submit} className="space-y-6">
                    <div className="grid gap-2">
                        <Label htmlFor="title">Assignemnent Title</Label>

                        <Input
                            id="title"
                            className="mt-1 block w-full"
                            value={data.title}
                            onChange={(e) => setData('title', e.target.value)}
                            required
                            autoComplete="title"
                            placeholder="Course 01 "
                        />

                        <InputError className="mt-2" message={errors.title} />
                    </div>
                    <div className="grid gap-2">
                        <Label htmlFor="title">Assignment level</Label>

                        <Textarea
                            id="level"
                            className="border-input file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground flex h-8 w-full min-w-0 rounded-md border bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm"
                            value={data.level}
                            onChange={(e) => setData('level', e.target.value)}
                            autoComplete="level"
                            placeholder="Advanced"
                        ></Textarea>

                        <InputError className="mt-2" message={errors.level} />
                    </div>
                    <div className="grid gap-2">
                        <Label htmlFor="title">Assignment marks</Label>

                        <Textarea
                            id="mark"
                            className="border-input file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground flex h-8 w-full min-w-0 rounded-md border bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm"
                            value={data.mark}
                            onChange={(e) => setData('mark', e.target.value)}
                            autoComplete="mark"
                            placeholder="Advanced"
                        ></Textarea>

                        <InputError className="mt-2" message={errors.mark} />
                    </div>
                    <div className="grid gap-2">
                        <Label htmlFor="title">Assignment questions</Label>

                        <Textarea
                            id="question"
                            className="border-input file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground flex h-40 w-full min-w-0 rounded-md border bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm"
                            value={data.question}
                            onChange={(e) => setData('question', e.target.value)}
                            autoComplete="question"
                            placeholder="Q1 )..............."
                        ></Textarea>

                        <InputError className="mt-2" message={errors.question} />
                    </div>
                    <div>
                        <Button>Save</Button>
                    </div>
                </form>
            </div>
        </AppLayout>
    );
}
