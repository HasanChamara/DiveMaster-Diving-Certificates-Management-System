import React from 'react';

interface LinkProps {
    href: string;
    children: React.ReactNode;
    className?: string;
    onClick?: () => void;
}

export const Link: React.FC<LinkProps> = ({ href, children, className = '', onClick }) => {
    const handleClick = (e: React.MouseEvent) => {
        e.preventDefault();
        if (onClick) onClick();
        window.history.pushState({}, '', href);
        const navigationEvent = new PopStateEvent('popstate');
        window.dispatchEvent(navigationEvent);
    };

    return (
        <a href={href} className={className} onClick={handleClick}>
            {children}
        </a>
    );
};
