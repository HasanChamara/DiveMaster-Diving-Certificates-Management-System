import { PlaceholderPattern } from '@/components/ui/placeholder-pattern';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, usePage, useForm } from '@inertiajs/react';
import { Certificate } from 'node:crypto';
import { FormEventHandler } from 'react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Certificates',
        href: '/certificates',
    },
];

export default function Certificates() {
    const {certificates} = usePage().props

    const {delete: destroy} = useForm();

    const destroyCertificate: FormEventHandler = (e, id) =>{
        e.preventDefault();
        if (confirm("Are you sure you want to delete this certificate ?")){
            destroy(route('certificates.destroy', id));
        }
    }
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Certificates" />
            
            <div className="flex w-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div>
                        <Link  href={route('certificates.create')}
                            className="px-3 py-2 text-xs font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800"
                        >
                            Create a Certificate
                        </Link>
                    </div>
                <div className="overflow-x-auto">
                    
                    <table className="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead className="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                        <th scope="col" className="px-6 py-3">ID</th>
                        <th scope="col" className="px-6 py-3">Title</th>
                        <th scope="col" className="px-6 py-3">Details</th>
                        <th scope="col" className="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    {certificates.map(({id, title, body}) =>(
                        <tbody key={id}>
                        <tr className="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td className="px-6 py-2 font-medium text-gray-900 dark:text-white">{id}</td>
                        <td className="px-6 py-2 text-gray-600 dark:text-gray-300">{title}</td>
                        <td className="px-6 py-2 text-gray-600 dark:text-gray-300">{body}</td>
                        <td className="px-6 py-2 flex gap-2">
                            <form onSubmit={(e => destroyCertificate(e, id))}>
                        <br></br>

                        <Link  href={route('certificates.edit', id)}
                            className="px-3 py-2 text-xs font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800"
                        >
                            Edit Certificate
                        </Link>
                        <br></br>
                        <br></br>
                            <button className="px-3 py-2 text-xs font-medium text-white bg-red-700 rounded-lg hover:bg-red-800">
                            Delete Certificate
                            </button>
                        <br></br>

                            </form>
                        </td>
                        </tr>
                    </tbody>
                    ) )}
                    
                    </table>
                </div>
                </div>

        </AppLayout>
    );
}
