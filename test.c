#include <unistd.h>

char    *ft_strncat(char *dest, char *src, unsigned int nb)
{
        unsigned int i;
        unsigned int j;

        i = 0;
        j = 0;
        while (dest[i] != '\0')
                i++;
        while (src[j] != '\0' && j < nb)
        {
                dest[i] = src[j];
                i++;
                j++;
        }
        dest[i] = '\0';
        return (dest);
}

int     main() {
        char dest[] = "test";
        char src[] = "bonjour";
        unsigned int n = 5;

        *dest = *ft_strncat(dest, src, n);
        int i = 0;
        while (dest[i]) {
                write(1, &dest[i], 1);
                i++;
        }
        return (0);
}
